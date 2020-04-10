<?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if($id != '') {
        $where[] = ['id', '=', $id];
        $db = new DB();
        $db->delete($where);
        $old_image = ROOT_PATH . '/uploads/' .$obj->image;
        unlink($old_image);
        $_SESSION["message"] = "Đã xóa thành công id = $id";
        header("Location: $base_url/admin");
    }
?>

