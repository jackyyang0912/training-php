<?php
class Errors extends Controller {
    public function index() {
        $this->view->msg = 'Day la trang loi';
        $this->view->load('error/error');
    }
    public function message() {
        $this->view->template = 'error/index';
        $this->view->load('site/layout');
    }
}