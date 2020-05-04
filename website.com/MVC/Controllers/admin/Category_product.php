<?php

use Rakit\Validation\Validator;

class Category_product extends Controller {

    public $db_category_product = null;

    public function __construct($params) {
        parent::__construct($params);
        $this->db_category_product = $this->db('Category_product_Model');

    }


    public function index(){

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';
        $page = isset($_GET['page']) ? $_GET['page'] : '';
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

        // Trang 1  limit 0,10;  offset = currentPage
        // Trang 2  limit 10,20;
        // Trang 2  limit 20,30  
        // Trang i  limit offset,itemperpage    offset = i

        $totalRow = count($this->db_category_product->selectAll($select));
        $itemperPage = 10 ;
        $totalPage = ceil($totalRow/$itemperPage );
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = $itemperPage*($currentPage -1);
        $select['limit'] = [$offset,$itemperPage];


        $this->view->id = $id;
        $this->view->name = $name;
        $this->view->status = $status;
        $this->view->totalPage = $totalPage;
        $this->view->currentPage = $currentPage;
        $this->view->data = $this->db_category_product->selectAll($select);
        $this->view->template = 'category_product/index';
        $this->view->load('admin/layout');
    }

    public function changeStatus(){

        if(isset($_GET['id']) && isset($_GET['status'])){

            $id = $_GET['id'];
            $update_status = $_GET['status'];

            $update_status = $update_status == 1 ? 0 : 1;

            $update['set'][] = ['status', '=', $update_status];
            $update['where'] = $id;

            if($this->db_category_product->update($update,$id)){
                $url = BASE_PATH . 'index.php?module=admin&controller=category_product&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function delete(){

        //Xoa 1 id + hinh
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $this->view->item = $this->db_category_product->selectOne($id);

            //Xoa 1 file hinh
            $old_image = ROOT_PATH . 'uploads/' . $this->view->item->image;
            if(file_exists($old_image)){
                unlink($old_image);
            }
            //Xoa 1 id
            if($id != '') {
                if($this->db_category_product->delete($id)){
                    $url = BASE_PATH . 'index.php?module=admin&controller=category_product&action=index';
                    header('location: ' . $url);
                }
            }


        //Xoa multi (ids + file hinh)
        if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
            $ids = $_POST['ids'];

            //Xoa nhieu file hinh
            foreach($ids as $val){
                $select['where'][0] = ['id','=',$val];
                $this->view->data = $this->db_category_product->selectAll($select);
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
            if($this->db_category_product->delete($ids)){
                $url = BASE_PATH . 'index.php?module=admin&controller=category_product&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function add(){
        $errors = '';

        if(isset($_POST['submit'])) {
            $validator = new Validator;
            $validation = $validator->make($_POST + $_FILES, [
                'status'                => 'required',
                'name'                  => 'required|min:5',

            ]);

            $validation->setMessages([
                'name:required'         => 'Tên Danh mục không được rỗng',
                'status:required'       => 'Trạng thái sản phẩm không được rỗng',
            ]);
    
            $validation->validate();
    
            if ($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
            }else {

                //image
                if($_FILES["image"]["name"]){
                    $name_image = time() . '-' . $_FILES["image"]["name"];
                    $path_image = ROOT_PATH .'uploads/' . $name_image;
                    move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
                }else{
                    $name_image = null;
                }


                //insert
                $data = [

                    'name'          => $_POST['name'],
                    'decription'    => $_POST['decription'],
                    'detail'        => $_POST['detail'],
                    'status'        => $_POST['status'],
                    'image'         => $name_image ,
                    'created'       => time()
                ];

                echo '<pre>';
                print_r($data);
                echo  '</pre>';
                $this->db_category_product->add($data);
                $url = BASE_PATH . 'index.php?module=admin&controller=category_product&action=index';
                header('location: ' . $url);
            }
        }
        
        //danh sách cate
        $this->view->errors = $errors;
        $this->view->template = 'category_product/add';
        $this->view->load('admin/layout');
    }



    public function edit(){
        
        $errors = '';
        $id = isset($_GET['id']) ?  $_GET['id'] : 0;
    
        $this->view->item = $this->db_category_product->selectOne($id);
        
        $url = BASE_PATH . 'index.php?module=admin&controller=category_product&action=index';
        if(empty($this->view->item)){
            header('location: ' . $url);
        } 


        if(isset($_POST['submit'])) {
            $validator = new Validator;
            $validation = $validator->make($_POST + $_FILES, [
                'status'                => 'required',
                'name'                  => 'required|min:5',
                'detail'                => 'required',

            ]);

            $validation->setMessages([
                'name:required'         => 'Tên sản phẩm không được rỗng',
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
                    'name'          => $_POST['name'],
                    'decription'    => $_POST['decription'],
                    'detail'        => $_POST['detail'],
                    'status'        => $_POST['status'],
                    'image'         => $name_image ,
                    'created'       => time()
                ];
                $this->db_category_product->edit($id,$data);
                $url = BASE_PATH . 'index.php?module=admin&controller=category_product&action=index';
                header('location: ' . $url);
            }
        }

        $db_category_product = $this->db('Category_product_Model');
        $this->view->data_category_product = $db_category_product->selectAll();
        $this->view->errors = $errors;

        $this->view->template = 'category_product/edit';
        $this->view->load('admin/layout');
    }


}