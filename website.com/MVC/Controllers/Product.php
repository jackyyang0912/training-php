<?php

class Product extends Controller {
    public function index(){

        $db1 = $this->db('Product_Model');

        $this->view->data = $db1->selectAll();


        $this->view->load('product/index');
    }

    public function get(){
        $this->view->load('product/get');
    }

    public function set(){
        $this->view->load('product/set');
    }

}

?>