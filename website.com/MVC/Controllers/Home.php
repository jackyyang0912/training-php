<?php

class Home extends Controller {
    public function index(){
        echo __METHOD__ . '<br>';
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

