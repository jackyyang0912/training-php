
<?php

    class Controller {
        
        protected $view = null;

        public function __construct($params) {

            $this->view = new View;
  
            session_start();
            $module = $params['module'];
            $controller = $params['controller'];
            $action = $params['action'];
            
            
            if($module == 'admin') {
                if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {

                    $user = $_SESSION['user'];
                    foreach($user as $val)
                    if($val->level < 2) {
                        $_SESSION['message'] = 'Bạn không đủ quyền vào trang này';
                        $url = BASE_PATH . 'index.php?controller=errors&action=message';
                        header('location: ' . $url);
                    }
                    //login thành công
                     if($controller == 'user' && $action == 'login') {
                        $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                        header('location: ' . $url);
                    }
                }else {
                    if($controller != 'user' || $action != 'login') {
                        $url = BASE_PATH . 'index.php?module=admin&controller=user&action=login';
                        header('location: ' . $url);
                    }
                }
            }
        }

        public function db($name_model) {
            $path = ROOT_PATH . 'models' . DS . $name_model  . '.php';
            if(file_exists($path)) {
                require_once $path;
                return new $name_model;
            }   
        }

        public static function foreachData($data ,$xhtml) {
            $xhtml = '';
            if($data){
                foreach($data as $key => $obj){
                    $image = BASE_PATH . 'uploads' . DS . $obj->image;
                    $xhtml;
                }
            }
            return $xhtml;
        }

    }
    
