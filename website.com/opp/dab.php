<?php
    require_once('./database.php');
    $db = new database();
    
    $where = array(
        ['id', '>', 444]
    );
    $data = $db->getAll(['id', 'name', 'status'], $where);
    echo '<pre>';
    print_r($data);
    echo '</pre>';die();