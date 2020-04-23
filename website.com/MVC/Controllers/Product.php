<?php

class Product extends Controller {

    public $db_product = null;

    public function __construct(){
        parent::__construct();
        $this->db_product = $this->db('Product_Model');
    }


    public function index(){
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';
        $where= [];
        if($id != '') {
            $where['where'][] = ['id', '=', $id];
        }
        if($name != '') {
            $name = '%' . $name . '%';
            $where['where'][] = ['name', ' LIKE ', $name];
        }

        if($status != '') {
            $where['where'][] = ['status', '=', $status];
        }

        $this->view->id = $id;
        $this->view->name = $name;
        $this->view->status = $status;
        
        $this->view->data = $this->db_product->selectAll($where);
        $this->view->load('product/index');
    }

    public function changeStatus(){

        if(isset($_GET['id']) && isset($_GET['status'])){

            $id = $_GET['id'];
            $update_status = $_GET['status'];

            $update_status = $update_status == 1 ? 0 : 1;

            $update['set'][] = ['status', '=', $update_status];
            $update['where'] = $id;

            if($this->db_product->update($update,$id)){
                $url = BASE_PATH . 'index.php?controller=product&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function delete(){

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $image = isset($_GET['image']) ? $_GET['image'] : '';

        //Xoa file hinh
        $old_image = ROOT_PATH . '/uploads/' . $obj->image;
        if(file_exists($old_image)){
            unlink($old_image);
        }

        //Xoa id
        if($id != '') {

            $select['where'][] = ['id','=', $id]; 
        
            if($this->db_product->delete($id)){
                $url = BASE_PATH . 'index.php?controller=product&action=index';
                header('location: ' . $url);
            }
        }



        //Xoa multi
        if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
            $ids = $_POST['ids'];

            //Xoa nhieu file hinh
            foreach($ids as $val){
                $select['where'][0] = ['id','=',$val];
                $this->view->data = $this->db_product->selectAll($select);
                if($this->view->data) {
                    foreach($this->view->data as $obj) {
                    }
                }
                $old_image = ROOT_PATH . '/uploads/' . $obj->image;
                if(file_exists($old_image)){
                    unlink($old_image);
                }
            }

            //Xóa nhiều id
            if($this->db_product->delete($ids)){
                $url = BASE_PATH . 'index.php?controller=product&action=index';
                header('location: ' . $url);
            }
        }
    }

}

?>