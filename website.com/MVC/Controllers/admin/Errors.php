<?php

class Errors extends Controller {
    public function __construct($params) {    
        parent::__construct($params);  
    }
    public function index() {
        $this->view->msg = 'Day la trang loi';
        $this->view->load('error/error');
    }
}
?>