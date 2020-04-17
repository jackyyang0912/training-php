<?php

class Product extends Controller {
    public function index(){
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