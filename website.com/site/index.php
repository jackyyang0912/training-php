<?php

   session_start();
   require_once "./../define.php";
   require_once ('./../libs/database.php');
   $connect = connect_db();

   $controller = isset($_GET['controller']) ? $_GET['controller'] : 'product';
   $action = isset($_GET['action']) ? $_GET['action'] : 'index';

   if(!file_exists(ROOT_PATH . "/site/$controller/$action.php")){
      $controller = 'notify';
      $action = '404';
   }

   require_once ROOT_PATH . "/site/$controller/$action.php";




?>
