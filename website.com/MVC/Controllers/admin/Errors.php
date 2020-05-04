<?php

    class Errors extends Controller{
        public function index() {
            $this->view->msg = ' Link not found!! 404 ';
            $this->view->load('error/error');
        }
    }

?>