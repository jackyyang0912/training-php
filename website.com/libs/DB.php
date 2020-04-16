<?php

class DB {
    private $conn   = null;
    private $table  = "product";

    // Ket noi database
    public  function __construct() {
        $servername = "localhost" ;
        $username   = "root";
        $password   = "";
        $dtb_name   = "my_table_product";
        
        $connect    = @mysqli_connect($servername, $username, $password, $dtb_name);
        if($connect){
            $this->conn = $connect;
            @mysqli_set_charset($connect,"utf8");
        }
    }


    public function selectAll($select= []) {

        $data = null;
        $str_column = "*";
        $str_where = '';
        $str_limit = 'LIMIT 0,10';
        $limit = [0,10];
        $str_select = "";

        //xử lý điều kiện colums
        if(isset($select['column']) && !empty($select['column'])) {
            $str_column = implode(',', $select['column']);
        }

        //xử lý điều kiện table
        $this->table;

        //xử lý điều kiện where
        if(isset($select['where']) && !empty($select['where'])) {
            $str_where = " WHERE " . $this->createSqlWhere($select['where']) ;
        }
        
        //Xu li dieu kien limit
        if(isset($select['limit']) && !empty($select['limit'])) {
            $limit = $select['limit'];
            $str_limit = 'LIMIT ' . $limit[0] . ',' . $limit[1];//LIMIT 0, 10
        }
            
        //Cau sql
        $sql = "SELECT $str_column FROM $this->table $str_where $str_limit";
        echo $sql;
        $result = mysqli_query ($this->conn, $sql);
        if($result) {
            while($item = mysqli_fetch_object($result)) {
                $data[] = $item;
            }
        }
        return $data;
    }

    // Ham tao cau sql where
    public function createSqlWhere($select = []) {
        $str = '';
            foreach($select as $key => $row) {
                if(!empty($row)) {
                    $str .= $row[0] . $row[1] . (is_numeric($row[2]) ? $row[2] : '\'' . $row[2] . '\'');                  
                }
                if(count($select) - $key != 1) {
                    $str .= ' AND ';
                }
            }
        return $str;
    }

    //Ham tao cau multi
    public function creatSqlmulti($value) {
        $str_multi = '';
        if(!is_array($value)) {
            if(!empty($value)) {
            $str_multi = " id = $value";
            }
        }else {
            $str_multi = " id IN " . "(" . implode(',', $value) . ")";
        }
        return $str_multi;
    }


    //DELETE single-multi
    public function delete($value) {
        if(!empty($value)) {
            $delete_where =  $this->creatSqlmulti($value);
            $sql = "DELETE FROM $this->table WHERE $delete_where";
        }
        return mysqli_query ($this->conn, $sql);
    }


    // UPDATE single-multi
    public function update($update) {
        $str_set = '';
        if(isset($update['set']) && !empty($update['set'])) {
            foreach($update['set'] as $key => $row) {
                if(!empty($row)) {
                    $str_set .= $row[0] . $row[1] . (is_numeric($row[2]) ? $row[2] : '\'' . $row[2] . '\'');                  
                }
                if(count($update['set']) - $key != 1) {
                    $str_set .= ' , ';
                }
            }
            $str_where = $this->creatSqlmulti($update['where']);
            $sql = "UPDATE $this->table SET $str_set WHERE $str_where";
        }
        return mysqli_query ($this->conn, $sql);
    }

    public function create($create) {
        $str_create = "";
        if(isset($create) && !empty($create)) {
            $str_create = "(" . implode(',', $create) . ")";
            $sql = "INSERT INTO $this->table VALUES $str_create";
        }
        return mysqli_query ($this->conn, $sql);
    }



}









