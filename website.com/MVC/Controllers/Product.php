
<?php

class Product extends Controller {
    public $db_product = null;
    public function __construct($params) {
        parent::__construct($params);
        $this->db_category_product = $this->db('Category_product_Model');
        $this->db_product = $this->db('Product_Model');
    }

    public function index() {
        $errors = '';

        $select = [];
        $select['where'][] = ['status', '=', 1];
        $this->view->list_category = $this->db_category_product->selectAll($select);

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if($id){
            $select = [];
            $select['where'] = [['category_id', '=', $id],['status', '=', 1]];
            $this->view->list_product =  $this->db_product->selectAll($select);
            if(empty($this->view->list_product)){
                $this->view->errors = 'Không có sản phẩm';
            }
        }else{
            $select = [];
            $select['where'][] = ['status', '=', 1];
            $this->view->list_product =  $this->db_product->selectAll($select);
        }

        $this->view->template = 'product/index';
        $this->view->load('site/layout');
    }


    public function detail() {

        $select = [];
        $select['where'][] = ['status', '=', 1];
        $this->view->list_category = $this->db_category_product->selectAll($select);

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $data = '';
        $related = [];
        if($id) {
            $select['where'][] = ['id', '=', $id];
            $data = $this->db_product->selectAll($select); 
            foreach($data as $val)
            $param['where'][] = ['category_id', '=', $val->category_id];
            $param['where'][] = ['id', '<>', $id];
            $this->view->related =  $this->db_product->selectAll($param);
        }else{
            $data = $this->db_product->selectAll($select);
        }


        $this->view->data = $data;
        $this->view->template = 'product/detail';
        $this->view->load('site/layout');
    }
}