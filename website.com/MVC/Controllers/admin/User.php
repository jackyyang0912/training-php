<?php

use Rakit\Validation\Validator;

class User extends Controller {

    public $db_user = null;

    public function __construct($params){
        parent::__construct($params);
        $this->db_user = $this->db('User_Model');

    }


    public function index(){

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
 
        $select= [];
        if($id != '') {
            $select['where'][] = ['id', '=', $id];
        }
        if($name != '') {
            $select['where'][] = ['name', ' LIKE ', '%' . $name . '%'];
        }


        $totalRow = count($this->db_user->selectAll($select));
        $itemperPage = 10 ;
        $totalPage = ceil($totalRow/$itemperPage );
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        if($currentPage){
            $url_search = '&id=' .$id . '&name=' . $name . '&status=' . $status;
        }

        $this->view->url_search = $url_search;

        $offset = $itemperPage*($currentPage -1);
        $select['limit'] = [$offset,$itemperPage];

        $this->view->id = $id;
        $this->view->name = $name;
        $this->view->totalPage = $totalPage;
        $this->view->currentPage = $currentPage;
        $this->view->data = $this->db_user->selectAll($select);
        $this->view->template = 'user/index';
        $this->view->load('admin/layout');
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
                    $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                    header('location: ' . $url);
                }
            }
        }
        $this->view->errors = $errors;
        $this->view->load('admin/login');
    }

    public function logout() {
        session_destroy();
        $url = BASE_PATH . 'index.php?module=admin&controller=user&action=login';
        header('location: ' . $url);
    }

    public function changeStatus(){

        if(isset($_GET['id']) && isset($_GET['status'])){

            $id = $_GET['id'];
            $update_status = $_GET['status'];

            $update_status = $update_status == 1 ? 0 : 1;

            $update['set'][] = ['status', '=', $update_status];
            $update['where'] = $id;

            if($this->db_user->update($update,$id)){
                $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function delete(){

        //Xoa 1 id + hinh
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $this->view->item = $this->db_user->selectOne($id);

            //Xoa 1 file hinh
            $old_image = ROOT_PATH . 'uploads/' . $this->view->item->image;
            if(file_exists($old_image)){
                unlink($old_image);
            }
            //Xoa 1 id
            if($id != '') {
                if($this->db_user->delete($id)){
                    $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index';
                    header('location: ' . $url);
                }
            }


        //Xoa multi (ids + file hinh)
        if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
            $ids = $_POST['ids'];

            //Xoa nhieu file hinh
            foreach($ids as $val){
                $select['where'][0] = ['id','=',$val];
                $this->view->data = $this->db_user->selectAll($select);
                if($this->view->data) {
                    foreach($this->view->data as $obj) {
                        $old_image = ROOT_PATH . 'uploads/' . $obj->image;
                        if(file_exists($old_image)){
                            unlink($old_image);
                        }
                    }
                }
            }

            //Xóa nhiều id
            if($this->db_user->delete($ids)){
                $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function add(){
        $errors = [];
        $data = [];
        if(isset($_POST['submit'])) {


            $validator = new Validator;

            $validation = $validator->make($_POST, [
                'email'                 => 'required|email',
                'username'              => 'required|min:3',
                'password'              => 'required',
                're_password'           => 'required|same:password',

            ]);

            $validation->setMessages([
                'email:required'        => 'Email không được rỗng',
                'email:email'           => 'Email chưa đúng',
                'username:required'     => ':attribute không được rỗng',
                'username:min'          => ':attribute ít nhất 3 ký tự',
                'password:required'     => ':attribute không được rỗng',
                're_password:required'  => 'Nhập lại password không được rỗng',
                're_password:same'      => ':attribute không trùng khớp',
            ]);
    
            $validation->validate();

            if ($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
            }else {
                $select['where'][] = ['username', '=', $_POST['username']] ;
                if($this->db_user->selectAll($select)){
                    $errors[] = 'Username đã tồn tại';
                }else {
                    $data = [
                        'status'            => $_POST['status'],
                        'level'             => $_POST['level'],
                        'name'              => $_POST['name'],
                        'email'             => $_POST['email'],
                        'address'           => $_POST['address'],
                        'phone'             => $_POST['phone'],
                        'username'          => $_POST['username'],
                        'password'          => md5($_POST['password']),
                        'created'           => time()
                    ];
                    //image
                    if($_FILES["image"]["name"]){
                        $name_image = time() . '-' . $_FILES["image"]["name"];
                        $path_image = ROOT_PATH .'./uploads/' . $name_image;
                        move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
                        $data['image'] = $name_image;
                    }

                    
                    //insert
                    $this->db_user->add($data);
                    $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index';
                    header('location: ' . $url);
                }
            }
        }
        
        $this->view->errors = $errors;
        $this->view->data = $data;
        $this->view->template = 'user/add';
        $this->view->load('admin/layout');
    }



    public function edit(){
        
        $errors = [];
        $id = isset($_GET['id']) ?  $_GET['id'] : 0;
    
        $this->view->item = $this->db_user->selectOne($id);

        $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index';
        if(empty($this->view->item)){
            header('location: ' . $url);
        } 


        if(isset($_POST['submit'])) {
            $validator = new Validator;
            $validation = $validator->make($_POST + $_FILES, [
                'email'                 => 'required|email',

            ]);

            $validation->setMessages([
                'email:required' => 'Email không được rỗng',
                'email:email' => 'Email chưa đúng',


            ]);
    
            $validation->validate();
    
            if ($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
            }else {
                $flag_insert = true;
                if($_POST['password_old']) {
                    $select['where'] = [['id', '=', $id], ['password', '=', md5($_POST['password_old'])]];
                    if(!$this->db_user->selectAll($select)) {
                        $errors[] = 'Password current không đúng';
                        $flag_insert = false;
                    }else {
                        if(empty($_POST['password'])) {
                            $errors[] = 'Password mới không được rỗng';
                            $flag_insert = false;
                        }else {
                            //check pass and re pass
                            if($_POST['password'] != $_POST['re_password']) {
                                $errors[] = 'Password không trùng khớp';
                                $flag_insert = false;
                            } 
                        }
                    }
                    
                }

                if($flag_insert) {
                //image
                    if($_FILES["image"]["name"]){
                        $name_image = time() . '-' . $_FILES["image"]["name"];
                        $path_image = ROOT_PATH .'./uploads/' . $name_image;
                        move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
                        $old_image = ROOT_PATH .'uploads/' . $this->view->item->image;
                        if(file_exists($old_image)){
                            unlink($old_image);
                        }

                    }else{
                        $name_image = $this->view->item->image;
                    }
                    

                    //insert
                    $data = [
                        'status'            => $_POST['status'],
                        'level'             => $_POST['level'],
                        'name'              => $_POST['name'],
                        'email'             => $_POST['email'],
                        'address'           => $_POST['address'],
                        'phone'             => $_POST['phone'],
                        'phone'             => $_POST['phone'],
                        'image'             => $name_image,
                        'password'          => md5($_POST['password']),
                        'created'           => time()
                    ];


                    $this->db_user->edit($id,$data);
                    $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index';
                    header('location: ' . $url);
                }
            }
        }

        $db_user = $this->db('User_Model');
        $this->view->data_user = $db_user->selectAll();
        $this->view->errors = $errors;
        $this->view->template = 'user/edit';
        $this->view->load('admin/layout');
    }
}

?>