<?php
use Rakit\Validation\Validator;
class User extends Controller {
    public $db_user = null;
    public function __construct($params) {    
        parent::__construct($params);
        $action = $params['action'];
        if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
            if($action != 'logout') {
                $url = BASE_PATH . 'index.php?controller=home&action=index';
                header('location: ' . $url);exit();
            }
        }  
        $this->db_user = $this->db('User_Model');
    }

    public function login() {
        $errors = [];
        if(isset($_POST['submit'])) {
            $validator = new Validator;
            $validation = $validator->make($_POST, [
                'username'                  => 'required',
                'password'                 => 'required',
            ]);

            $validation->setMessages([
                'username:required' => ':attribute không được rỗng',
                'password:required' => ':attribute không được rỗng',
            ]);
    
            $validation->validate();
    
            if ($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
            } else {
                $select['where'] = [['username', '=', $_POST['username']], ['password', '=', md5($_POST['password'])]];
                if(!$this->db_user->selectAll($select)) {
                    $errors[] = 'Thông tin đăng nhập chưa đúng';
                }else {
                    $user = $this->db_user->selectAll($select);
                    $_SESSION['isLogin'] = true;
                    $_SESSION['user'] = $user;
                    $url = BASE_PATH . 'index.php?controller=home&action=index';
                    header('location: ' . $url);
                }
            }
        }
        
        $this->view->errors = $errors;
        $this->view->template = 'user/login';
        $this->view->load('site/layout');
    }

    public function register() {


        $this->view->template = 'user/register';
        $this->view->load('site/layout');
    }

    
    public function logout() {
        session_destroy();
        $url = BASE_PATH . 'index.php?controller=home&action=index';
        header('location: ' . $url);exit();
    }


}