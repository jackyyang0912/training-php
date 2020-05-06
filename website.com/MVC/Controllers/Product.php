
<?php

class Product extends Controller {
    public $db_product = null;
    public function __construct($params) {
        parent::__construct($params);
        $this->db_product = $this->db('Product_Model');
    }

    public function index() {
        
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if($id){
            $select['where'][] = ['id', '=', $id];
            $data = $this->db_product->selectAll($select);
        }else {
            $data = $this->db_product->selectAll();
        }
        
 
        $this->view->data = $data;

        $this->view->template = 'product/index';
        $this->view->load('site/layout');
    }


}