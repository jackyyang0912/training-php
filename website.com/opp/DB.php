<?php

class DB {
    private $conn = null;
    private $table = null;
    
    // Ket noi database
    public  function __construct() {
        $servername = "localhost" ;
        $username   = "root";
        $password   ="";
        $dtb_name   = "my_table_product";
        $table      = "product";
        $conn    = @mysqli_connect($this->servername, $this->username, $this->password, $this->dtb_name);
        @mysqli_set_charset($connect,"utf8");
        if($conn){
            $this->conn = $conn;
            $this->table = $table;
        }
    }


    public function getAll($select = [], $where = [], $limit = [0, 10]) {
        $data = null;
        $sql = '';
        $str_where = '';
        $str_select = '*';


        //xử lý điều kiện select
        if(!empty($select)) {
            $str_select = implode(',', $select);
        }

        //xử lý điều kiện where
        if(!empty($where)) {
            foreach($where as $row) {
                if(!empty($row)) {
                    $str_where .= $row[0] . $row[1] . (is_numeric($row[2]) ? $row[2] : '\'' . $row[2] . '\'');                  
                }
                $str_where .= ' AND ';
            }
            $str_where = 'WHERE ' . $str_where . ' true';
        }



        //cau sql
        $sql = "SELECT $str_select FROM $this->table $str_where LIMIT $limit[0], $limit[1]";
        $result = mysqli_query ($this->conn, $sql);
        if($result) {
            while($item = mysqli_fetch_object($result)) {
                $data[] = $item;
            }
        }
        echo '<pre>';
        print_r($data);
        echo  '</pre>';
        return $data;
    }
}

$db = new DB();








