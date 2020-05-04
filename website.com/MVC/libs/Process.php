

<?php

class Process {

    public function __construct() {


        $module = isset($_GET['module']) ? $_GET['module'] : '';
        $controller = isset($_GET['controller']) ? $_GET['controller'] : 'product';
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
       
        $params = [
            'module' => $module,
            'controller' => $controller,
            'action' => $action,
        ];

        $class_name = ucfirst($controller);
        $path = ROOT_PATH . 'controllers/' . $class_name . '.php';
    
        if($module != '') {
            $path = ROOT_PATH . 'controllers' . DS . $module . DS . $class_name . '.php';
        }
       
        $flag_error = false;

        if(file_exists($path)){
            require_once  $path;
            if(class_exists($class_name)){
                $obj_controller = new $class_name($params);
                if(method_exists($obj_controller, $action)) {
                    $obj_controller->$action();
                }else {
                    $flag_error = true;
                }
            }else{
                $flag_error = true;
            }
        }else{
            $flag_error = true;
        }
        
        if($flag_error) {
            $path = ROOT_PATH . 'controllers/Errors.php';      
            if($module != '') {
                $path = ROOT_PATH . 'controllers' . DS . $module . DS . 'Errors.php';
            }
            require_once  $path;
            $error = new Errors($params);
            $error->index();
        }
    }
}
?>