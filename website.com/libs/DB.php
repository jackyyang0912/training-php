<?php

class DB {
    private $conn = null;
    private $table = null;

    public function __construct() {
        //Kết nối SQL
        $servername = "localhost" ;
        $username   = "root";
        $password   ="";
        $dtb_name   = "my_table_product";
        $table      = "product";
        $connect    = @mysqli_connect($servername, $username, $password, $dtb_name);
        // Change character set to utf8
        @mysqli_set_charset($connect,"utf8");
        if($connect){
            $this->conn = $connect;
            $this->table = $table;
        }

    }

    public function getAll($select = [], $where = [], $limit = [0, 10]) {
        $data = null;
        $sql = '';
        $str_where = '';
        $str_select = '*';

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
        //xử lý điều kiện select
        if(!empty($select)) {
            $str_select = implode(',', $select);
        }
        $sql = "SELECT $str_select FROM $this->table $str_where LIMIT $limit[0], $limit[1]";
        $result = mysqli_query ($this->conn, $sql);
        if($result) {
            while($item = mysqli_fetch_object($result)) {
                $data[] = $item;
            }
        }
        return $data;
    }

    public function delete($where = []) {
        $sql = '';
        $str_where = '';

        //xử lý điều kiện where
        if(!empty($where)) {
            foreach($where as $row) {
                if(!empty($row)) {
                    $str_where .= $row[0] . $row[1] . (is_numeric($row[2]) ? $row[2] : '\'' . $row[2] . '\'');                  
                }
            }
        }
        $sql = "DELETE FROM $this->table WHERE $str_where";
        mysqli_query ($this->conn, $sql);
    }



    public function update($where = []) {
        $sql = '';
        $str_where = '';

        //xử lý điều kiện where
        if(!empty($where)) {
            foreach($where as $row) {
                if(!empty($row)) {
                    $str_where .= $row[0] . $row[1] . (is_numeric($row[2]) ? $row[2] : '\'' . $row[2] . '\'');                  
                }
            }
        }
        $sql = "UPDATE $this->table SET $str_where";
        mysqli_query ($this->conn, $sql);
    }


    public function deletes($where = []) {
        $sql = '';
        $str_where = '';

        //xử lý điều kiện where
        if(!empty($where)) {
            foreach($where as $row) {
                if(!empty($row)) {
                    $str_where .= $row[0] . $row[1] . (is_numeric($row[2]) ? $row[2] : '\'' . $row[2] . '\'');                  
                }
                $str_where .= ' AND ';
            }
            $str_where = $str_where . ' true';
        }
        $sql = "DELETE FROM $this->table WHERE $str_where";
        echo $sql; die();
        mysqli_query ($this->conn, $sql);
    }

}






