<?php

class Home extends Controller {
    public function index(){
        
        $db3 = $this->db('Product_Model');

        $data3 = $db3->selectAll();
        echo "<pre>";
        print_r($data3);
        echo "</pre>";





        $this->view->load('home/index');
    }

    public function add(){
        echo __METHOD__;
        $this->view->load('home/add');
    }

    public function edit(){
        echo __METHOD__;
        $this->view->load('home/edit');
    }

}

