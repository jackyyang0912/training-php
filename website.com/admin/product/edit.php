<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chinh sua</title>
    <link rel="stylesheet" href="<?= $base_url ?>/public/styles.css">
</head>
<body>
<?php
    require_once('./../libs/DB.php');
    $db = new DB();
    $id = $_GET['id']; 
    $where[] = ['id','=',$id];
    $data = $db->selectAll($where);
    if($data) {
        foreach($data as $obj) { 


    if(isset($_POST['name'])) {
        $ids            = $_POST['id'];
        $category_id    = $_POST['category_id'];
        $name           = $_POST['name'];
        $status         = $_POST['status'];
        $picture        = $_POST['picture'];
        $decription     = $_POST['decription'];
        $detail         = $_POST['detail'];
        $price          = $_POST['price'];
        $created        = $_POST['created'];

        $errors     = [];
        
        if($ids == '') {
            $errors[] = 'id không được rỗng';
        }
        if($category_id == '') {
            $errors[] = 'category_id không được rỗng';
        }
        if($name == '') {
            $errors[] = 'name không được rỗng';
        }
        if($status == '') {
            $errors[] = 'status không được rỗng';
        }
        if($picture == '') {
            $errors[] = 'picture không được rỗng';
        }
        if($decription == '') {
            $errors[] = 'decription không được rỗng';
        }
        if($detail == '') {
            $errors[] = 'detail không được rỗng';
        }
        if($price == '') {
            $errors[] = 'price không được rỗng';
        }
        if($created == '') {
            $errors[] = 'created không được rỗng';
        }
    
        
        //Kiem tra file anh co ton tai hay khong
        if(isset($_FILES["image"]["name"]) && ($_FILES["image"]["name"] != "")) {
            if ($_FILES["image"]["size"] < 500) {
                $errors[] = 'Kính thước file quá lớn';
            }
            $type_file = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
            $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif', 'jfif');
            if (!in_array(strtolower($type_file), $type_fileAllow)) {
                $errors[] = 'File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh';
            }
                $old_image = ROOT_PATH .'/uploads/' .$row['image'];
                $name_image = time() . '-' . $_FILES["image"]["name"];
                $path_image = ROOT_PATH .'/uploads/' . $name_image;
                unlink($old_image);
                move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
            }else {
                $name_image = $obj->image;   
            }
        
            $update = [];
            if($ids != '') {
                $update[] = ['id', '=', $ids];
            }
            if($category_id != '') {
                $update[] = ['category_id', '=', $category_id];
            }
            if($name != '') {
                $update[] = ['name', '=', $name];
            }
            if($status != '') {
                $update[] = ['status', '=', $status];
            }
            if(isset($_FILES["image"]["name"]) && ($_FILES["image"]["name"] != "")) {
                $update[] = ['image', '=', $image];
            }
            if($picture != '') {
                $update[] = ['picture', '=', $picture];
            }
            if($decription != '') {
                $update[] = ['decription', '=', $decription];
            }
            if($detail != '') {
                $update[] = ['detail', '=', $detail];
            }
            if($price != '') {
                $update[] = ['price', '=', $price];
            }
            if($created != '') {
                $update[] = ['created', '=', $created];
            }

        echo "<pre>";
        print_r($update);
        echo "</pre>";

 
        $db->update($update,$id);
            $_SESSION["message"] = "Đã chỉnh sửa thành công id = $id";
            header("Location: $base_url/admin");
        
}
    //Kiem tra update status
        if(isset($_GET['id']) && isset($_GET['status'])){
            $id = $_GET['id'];
            $update_status = $_GET['status'];
            if($update_status == "New"){
                $update_status = "Used";
            }else{
                $update_status = "New";
            }
            echo 'get' . $_GET['status'].$update_status ; 

            $sql_update = "UPDATE product SET status = '$update_status' WHERE id = " . $id;
            echo $sql_update; 
            mysqli_query($connect, $sql_update);
            $_SESSION["message"] = "Đã update thành công id = $id (status = $update_status)";
            header("Location: $base_url/admin?");
        }
?>
    <div class="container">
        <div>
            <ul>
                <?php 
                    if(isset($errors)) {
                        foreach($errors as $val) { 
                ?>
                    <li><?php echo $val ?></li>
                <?php 
                        } 
                    }
                ?>
            </ul>
        </div>


    <div id="content">
        <h3>Thêm mới</h3>
            <div class="container">

                <form action="" method="POST" enctype="multipart/form-data">

                    <label for="fname">id</label>
                    <input type="text" id="fname" name="id" value="<?= isset($ids) ? $ids : $obj->id; ?>"><br><br>

                    <label for="fname">category_id</label>
                    <input type="text" id="fname" name="category_id" value="<?= isset($category_id) ? $category_id : $obj->category_id; ?>"><br><br>

                    <label for="fname">name</label>
                    <input type="text" id="fname" name="name" value="<?= isset($name) ? $name : $obj->name; ?>"><br><br>

                    <label for="fname">status</label>
                        <select name="status" >
                            <option value="<?= isset($status) ? $status : $obj->status; ?>"><?= isset($status) ? $status : $obj->status; ?></option>
                            <option value="<?= $obj->status != "New" ? "New" : "Used" ; ?>" ><?= $obj->status != "New" ? "New" : "Used" ; ?></option>
                        </select>
                    
                    <label for="lname">image</label>
                    <p><img src="<?= $base_url ?>/uploads/<?= $obj->image ?>" width="50" height="50"></p>
                    <input type="file" name="image">
                    </br>   

                    <label for="fname">picture</label>
                    <input type="text" id="fname" name="picture" value="<?= isset($picture) ? $picture : $obj->picture; ?>"><br><br>

                    <label for="fname">decription</label>
                    <input type="text" id="fname" name="decription" value="<?= isset($decription) ? $decription : $obj->decription; ?>"><br><br>

                    <label for="fname">detail</label>
                    <input type="text" id="fname" name="detail" value="<?= isset($detail) ? $detail : $obj->detail; ?>"><br><br>

                    <label for="fname">price</label>
                    <input type="text" id="fname" name="price" value="<?= isset($price) ? $price : $obj->price; ?>"><br><br>

                    <label for="fname">created</label>
                    <input type="text" id="fname" name="created" value="<?= isset($created) ? $created : $obj->created; ?>"><br><br>
                    
                    <input type="submit" value="Submit">
                </form>
        <?php }
        }?>

</html>