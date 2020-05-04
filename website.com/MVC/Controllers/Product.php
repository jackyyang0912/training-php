
<?php

class Product extends Controller {
    public $db_product = null;
    public function __construct($params) {
        parent::__construct($params);
        $this->db_product = $this->db('Product_Model');
    }

    public function index() {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $param = [];
        $param['where'][] = ['status', '=', 1];
        if($id) {
            $param['where'][] = ['id', '=', $id];
            
        }
        if($name) {       
            $param['where'][] = ['name', 'LIKE', '%' . $name . '%'];
        }

        //phân trang
        $totalRows = count( $this->db_product->selectAll($param));
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
        $itemPerPage = 10; //số item muốn hiển thị trên 1 trang
        $offset = $itemPerPage*($currentPage -1);
        $param['limit'] = [$offset, $itemPerPage];

        $this->view->currentPage = $currentPage;
        $this->view->totalRows = $totalRows;
        $this->view->itemPerPage = $itemPerPage;
        $this->view->id = $id;       
        $this->view->name = $name;
        $this->view->data =  $this->db_product->selectAll($param);
        $this->view->template = 'product/index';
        $this->view->load('site/layout');
    }

    public function detail() {

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $data = '';
        $related = [];
        if($id) {
            $data = $this->db_product->getOne([['id', '=', $id]]); 
            $param['where'][] = ['category_id', '=', $data->category_id];
            $param['where'][] = ['id', '<>', $id];
            $related =  $this->db_product->selectAll($param);
        }
        $this->view->related = $related;
        $this->view->data = $data;
        $this->view->template = 'product/detail';
        $this->view->load('site/layout');
    }

}