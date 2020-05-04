<?php

use Rakit\Validation\Validator;

class Product extends Controller {

    public $db_product = null;

    public function __construct($params){
        parent::__construct($params);
        $this->db_product = $this->db('Product_Model');
    }


    public function index(){

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';
        

        $select= [];
        if($id != '') {
            $select['where'][] = ['id', '=', $id];
        }
        if($name != '') {

            $select['where'][] = ['name', ' LIKE ', '%' . $name . '%'];
        }

        if($status != '') {
            $select['where'][] = ['status', '=', $status];
        }

        $totalRow = count($this->db_product->selectAll($select));
        $itemperPage = 10 ;
        $totalPage = ceil($totalRow/$itemperPage );
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        if($currentPage){
            $url_search = '&id=' .$id . '&name=' . $name . '&status=' . $status;
        }

        $this->view->url_search = $url_search;

        $offset = $itemperPage*($currentPage -1);
        $select['limit'] = [$offset,$itemperPage];
        
        $this->db_category_product = $this->db('Category_product_Model');
        $data = $this->db_product->selectAll($select);
        if($data) {
            foreach($data as $obj) {
                $obj->cate = $this->db_category_product->selectOne($obj->category_id);              
            }
        }


        $this->view->id = $id;
        $this->view->name = $name;
        $this->view->status = $status;
        $this->view->totalPage = $totalPage;
        $this->view->currentPage = $currentPage;
        $this->view->data = $data;
        $this->view->template = 'product/index';
        $this->view->load('admin/layout');
    }

    public function changeStatus(){

        if(isset($_GET['id']) && isset($_GET['status'])){

            $id = $_GET['id'];
            $update_status = $_GET['status'];

            $update_status = $update_status == 1 ? 0 : 1;

            $update['set'][] = ['status', '=', $update_status];
            $update['where'] = $id;

            if($this->db_product->update($update,$id)){
                $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function delete(){

        //Xoa 1 id + hinh
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $this->view->item = $this->db_product->selectOne($id);

            //Xoa 1 file hinh
            $old_image = ROOT_PATH . 'uploads/' . $this->view->item->image;
            if(file_exists($old_image)){
                unlink($old_image);
            }
            //Xoa 1 id
            if($id != '') {
                if($this->db_product->delete($id)){
                    $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                    header('location: ' . $url);
                }
            }


        //Xoa multi (ids + file hinh)
        if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
            $ids = $_POST['ids'];

            //Xoa nhieu file hinh
            foreach($ids as $val){
                $select['where'][0] = ['id','=',$val];
                $this->view->data = $this->db_product->selectAll($select);
                if($this->view->data) {
                    foreach($this->view->data as $obj) {
                        $old_image = ROOT_PATH . 'uploads/' . $obj->image;
                        if(file_exists($old_image)){
                            unlink($old_image);
                        }
                    }
                }
            }

            //Xóa nhiều id
            if($this->db_product->delete($ids)){
                $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function add(){
        $errors = '';

        if(isset($_POST['submit'])) {
            $validator = new Validator;
            $validation = $validator->make($_POST + $_FILES, [
                'category_id'           => 'required',
                'status'                => 'required',
                'name'                  => 'required|min:5',
                'price'                 => 'required|numeric',
                'detail'                => 'required',

            ]);

            $validation->setMessages([
                'name:required'         => 'Tên sản phẩm không được rỗng',
                'price:required'        => 'Giá sản phẩm không được rỗng',
                'numeric'               => 'Giá phải là số',
                'detail:required'       => 'Chi tiết sản phẩm không được rỗng',

            ]);
    
            $validation->validate();
    
            if ($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
            }else {

                //image
                $name_image = time() . '-' . $_FILES["image"]["name"];
                $path_image = ROOT_PATH .'uploads/' . $name_image;
                move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);

                //insert
                $data = [
                    'category_id'   => $_POST['category_id'],
                    'name'          => $_POST['name'],
                    'price'         => $_POST['price'],
                    'detail'        => $_POST['detail'],
                    'status'        => $_POST['status'],
                    'image'         => $name_image ,
                    'created'       => time()
                ];
                $this->db_product->add($data);
                $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                header('location: ' . $url);
            }
        }
        
        //danh sách cate
        $db_category_product = $this->db('Category_product_Model');
        $this->view->errors = $errors;
        $this->view->data_category_product = $db_category_product->selectAll();
        $this->view->template = 'product/add';
        $this->view->load('admin/layout');
    }



    public function edit(){
        
        $errors = '';
        $id = isset($_GET['id']) ?  $_GET['id'] : 0;
    
        $this->view->item = $this->db_product->selectOne($id);
        
        $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
        if(empty($this->view->item)){
            header('location: ' . $url);
        } 


        if(isset($_POST['submit'])) {
            $validator = new Validator;
            $validation = $validator->make($_POST + $_FILES, [
                'category_id'           => 'required',
                'status'                => 'required',
                'name'                  => 'required|min:5',
                'price'                 => 'required|numeric',
                'detail'                => 'required',

            ]);

            $validation->setMessages([
                'name:required'         => 'Tên sản phẩm không được rỗng',
                'category_id:required'  => 'Danh muc phẩm không được rỗng',
                'price:required'        => 'Giá sản phẩm không được rỗng',
                'numeric'               => 'Giá phải là số',
                'detail:required'       => 'Chi tiết sản phẩm không được rỗng',

            ]);
    
            $validation->validate();
    
            if ($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
            }else {

                //image
                if($_FILES["image"]["name"]){
                    $name_image = time() . '-' . $_FILES["image"]["name"];
                    $path_image = ROOT_PATH .'./uploads/' . $name_image;
                    move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);

                    $old_image = ROOT_PATH .'uploads/' . $this->view->item->image;
                    if(file_exists($old_image)){
                        unlink($old_image);
                    }

                }else{
                    $name_image = $this->view->item->image;
                }


                //insert
                $data = [
                    'category_id'   => $_POST['category_id'],
                    'name'          => $_POST['name'],
                    'price'         => $_POST['price'],
                    'detail'        => $_POST['detail'],
                    'status'        => $_POST['status'],
                    'image'         => $name_image ,
                    'created'       => time()
                ];

                $this->db_product->edit($id,$data);
                $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                header('location: ' . $url);
            }
        }

        $db_category_product = $this->db('Category_product_Model');
        $this->view->data_category_product = $db_category_product->selectAll();
        $this->view->errors = $errors;

        $this->view->template = 'product/edit';
        $this->view->load('admin/layout');
    }
}


?>