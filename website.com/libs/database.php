<?php
function connect_db() {
    //Kết nối SQL
    $servername = "localhost" ;
    $username = "root";
    $password ="";
    $dtb_name = "my_table_product";
    $connect = mysqli_connect($servername, $username, $password, $dtb_name);
    if(!$connect){
        die("Kết nối thất bại" . mysqli_connect_error());
    }
    return $connect;
}