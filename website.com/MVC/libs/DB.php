
<?php

class DB {
    private $conn   = null;
    protected $table  = "product";

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
        $str_limit = '';

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




    public function selectOne($id) {

        $data = null;
        $str_where = '';

        //xử lý điều kiện where
        if(isset($id) && !empty($id)) {
            $str_where = "id = " . $id ;
        }
            
        //Cau sql
        $sql = "SELECT * FROM $this->table WHERE $str_where";
        $result = mysqli_query ($this->conn, $sql);
        if($result) {
            while($item = mysqli_fetch_object($result)) {
                $data = $item;
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

        //INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);

    public function add($data) {
        if(count($data)>0){
            $str_col = implode( " , " , array_keys($data));
            $str_val = '';
            foreach($data as $row) {
                $str_val .= ',' . (is_numeric($row) ? $row : '\'' . $row . '\'');             
            }
            $str_val =  substr($str_val , 1);
            $sql = "INSERT INTO $this->table ($str_col) VALUES ($str_val)";
            return mysqli_query ($this->conn, $sql);
        }

    }

    public function edit($id, $data = []) {

        if(count($data)>0){
            $str_val = '';
            foreach($data as $key => $row) {
                $str_val .= ',' . $key . '=' . (is_numeric($row) ? $row : '\'' . $row . '\'');             
            }
            $str_val =  substr($str_val , 1);
            $sql = "UPDATE $this->table SET $str_val  WHERE id=$id";
            return mysqli_query ($this->conn, $sql);
        }

    }

}









