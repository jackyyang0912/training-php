
<?php
class View {
    public function load($url) {
        $path = ROOT_PATH . 'views' . DS . $url  . '.php';
        if(file_exists($path)) {
            require_once $path;
        }       
    }
}