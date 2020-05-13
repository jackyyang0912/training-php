<?php

class Order extends Controller {
    public $db_product = null;
    public function __construct($params) {
        parent::__construct($params);
        $this->db_product = $this->db('Product_Model');
        if(!isset($_SESSION['isLogin'])) {
            $url = BASE_PATH . 'index.php?controller=user&action=login';
            header('location: ' . $url);
        }
    }

    public function index() {

        $data = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        if($data) {
            foreach($data as $key => $val) {  
                $data[$key]['product'] = $this->db_product->selectOne($val['id']);   
            }
        }

        if($_SESSION['user']){
            foreach($_SESSION['user'] as $user);
        }
        
        $this->view->user = $user;
        $this->view->data = $data;
        $this->view->template = 'checkout/index';
        $this->view->load('site/layout');
    }

    public function add() {

        if(isset($_POST['submit'])) {

            $db_order = $this->db('Order_Model');

            if(isset($_SESSION['cart'])) {
                foreach($_SESSION['user'] as $user)
                $data = [
                    'user_id' => $user->id,
                    'address' => $_POST['address'],
                    'order_date' => time(),
                    'deliver_date' => strtotime($_POST['deliver_date']),
                    'status' => 0,
                ];
                $id = $db_order->add($data);

                if($id) {
                    $data = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                    if($data) {
                        $db_order_detail = $this->db('Order_detail_Model');
                        foreach($data as $key => $val) {  
                            $obj_product = $this->db_product->selectOne($val['id']);
                            $data = [
                                'order_id' => $id,
                                'product_id	' => $obj_product->id,
                                'price' => $obj_product->price,
                                'quantity' => $val['qty'],
                            ];
                            $db_order_detail->add($data);   
                        }
                    }
                }
                unset($_SESSION['cart']);
            }
        }
        $url = BASE_PATH . 'index.php?controller=home&action=index';
        header('location: ' . $url);
    }


}