<?php
class Home extends Controller {
    public $db_product = null;
    public function __construct($params) {
        parent::__construct($params);
        $this->db_product = $this->db('Product_Model');
    }



    public function index() {

        $this->view->data =  $this->db_product->selectAll();



        $this->view->template = 'home/index';
        $this->view->load('site/layout');
    }

}