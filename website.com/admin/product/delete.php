<?php

    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE id = " . $id;
    $result = mysqli_query($connect, "SELECT * FROM product WHERE id =  $id");
    $row   = mysqli_fetch_assoc($result);
    $old_image = ROOT_PATH . '/uploads/' .$row['image'];
    unlink($old_image);
    mysqli_query($connect, $sql);
    
    $_SESSION["message"] = "Đã xóa thành công id = $id";
    header("Location: $base_url/admin");
?>

