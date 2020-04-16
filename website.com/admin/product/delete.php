<?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    if($id != '') {
        $db = new DB;

    //
        $select['where'][] = ['id','=', $id]; 
        $data = $db->selectAll($select);
        if($data) {
            foreach($data as $obj) {
            }
        }
    
        $old_image = ROOT_PATH . '/uploads/' . $obj->image;
        if(file_exists($old_image)){
            unlink($old_image);
        }
        
        $db->delete($id);
        if($db->delete($id)){
            $_SESSION["message"] = "Đã xóa thành công id = $id";
        }
        header("Location: $base_url/admin");
    }
?>

