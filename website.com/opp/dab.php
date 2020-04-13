<?php
    require_once('./DB.php');
    $db = new DB();
    
    $select = [];
    $select['column'] = [];
    $select['where'] = [
        ['id','=',1],
        ['name','=','and'],
        ['status','=','asdfasdf'],
    ];
    $select['limit'] = [0,10];

    $data = $db->selectAll($select);
    echo "<pre>";
    print_r($select);
    echo "</pre>";

    $value = 1;
    
    $delete = $db->delete($value);

    $update = [];
    $update['set'] = [
        ['id','=',1],
        ['name','=','Teo'],
        ['status','=','available'],
    ];
    $update['where'] = 1;

    $update = $db->update($update);
    $multi  = $db->creatSqlmulti($value);
    


