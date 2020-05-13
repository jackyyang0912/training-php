<?php

class Category extends Controller {
    public $db_product = null;
    public $db_category_product = null;
    public function __construct($params) {
        parent::__construct($params);
        $this->db_category_product = $this->db('Category_product_Model');
        $this->db_product = $this->db('product_Model');
        if(!isset($_SESSION['isLogin'])) {
            $url = BASE_PATH . 'index.php?controller=user&action=login';
            header('location: ' . $url);
        }
    }

    public function index() {
        $errors = '';
        $data_product = '';
        $data = $this->db_category_product->selectAll();
        
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        if($id){
            $select['where'][] = ['category_id', '=', $id];
            if($this->db_product->selectAll($select)){
                $data_product = $this->db_product->selectAll($select);
            }else {
                $errors = 'Không có sản phẩm';
            }   
        }else{
            $data_product = $this->db_product->selectAll();
        }
        $this->view->errors = $errors;
        $this->view->data = $data;
        $this->view->data_product = $data_product;
        $this->view->template = 'Category/index';
        $this->view->load('site/layout');
    }


}