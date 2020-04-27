<?php

class Category_product extends Controller {

    public $db_category_product = null;

    public function __construct() {
        parent::__construct();
        $this->db_category_product = $this->db('Category_product_Model');

    }

    public function index() {



        $this->view->data_category_product = $this->db_category_product->selectAll();
        $this->view->load('category_product/index');
    }

}