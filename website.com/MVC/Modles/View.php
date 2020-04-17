<?php
echo 'day la file View.php'. '<br>';

class View {
    public function load($url) {
        echo __METHOD__ . '<br>';
        $path = ROOT_PATH . 'views' . DS . $url  . '.php';
        echo $path . '<br>';
        if(file_exists($path)) {
            require_once $path;
        }       
    }
}