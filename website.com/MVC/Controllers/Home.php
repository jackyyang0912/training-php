<?php
class Home extends Controller {
    public $db_product = null;
    public function __construct($params) {
        parent::__construct($params);
        $this->db_category_product = $this->db('Category_product_Model');
        $this->db_product = $this->db('Product_Model');
    }



    public function index() {

        $select = [];
        $select['where'][] = ['status', '=', 1];
        $this->view->list_category = $this->db_category_product->selectAll($select);

        $select = [];
        $select['where'][] = ['is_feature', '=', 1];
        $select['where'][] = ['status', '=', 1];
        $this->view->list_product_featured =  $this->db_product->selectAll($select);

        
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $select = [];
        $select['where'][] = ['category_id', '=', $id];
        $select['where'][] = ['status', '=', 1];
        $this->view->list_product =  $this->db_product->selectAll($select);

        $select = [];
        $select['where'][] = ['is_recommend', '=', 1];
        $select['where'][] = ['status', '=', 1];
        $this->view->list_product_recommend =  $this->db_product->selectAll($select);
       
        $this->view->template = 'home/index';
        $this->view->load('site/layout');
    }



}