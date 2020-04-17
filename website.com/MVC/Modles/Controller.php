<?php
    echo 'day la file Controller.php'. '<br>';
    class Controller {
        protected $view = null;
        public function __construct() {
            $this->view = new View;
        }
    }
?>