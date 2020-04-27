<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm mới</title>
        <link rel="stylesheet" href="<?= $base_url ?>/public/styles.css">
    </head>
<body>
<?php
    $db = new DB();

    if(isset($_POST['name'])) {
        $category_id    = $_POST['category_id'];
        $name           = $_POST['name'];
        $status         = $_POST['status'];
        $picture        = $_POST['picture'];
        $decription     = $_POST['decription'];
        $detail         = $_POST['detail'];
        $price          = $_POST['price'];
        $created        = $_POST['created'];

        $errors     = [];

        if($category_id == '') {
            $errors[] = 'Mã số danh mục không được rỗng';
        }
        if($name == '') {
            $errors[] = 'name không được rỗng';
        }
        if($status == '') {
            $errors[] = 'status không được rỗng';
        }
        if($picture == '') {
            $errors[] = 'Hình ảnh không được rỗng';
        }
        if($decription == '') {
            $errors[] = 'Mô tả không được rỗng';
        }
        if($detail == '') {
            $errors[] = 'Chi tiết không được rỗng';
        }
        if($price == '') {
            $errors[] = 'price không được rỗng';
        }
        if($created == '') {
            $errors[] = 'created không được rỗng';
        }

        if($_FILES["image"]["name"] == '') {
            $errors[] = 'Vui lòng chọn ảnh';
        }else {
            if ($_FILES["image"]["size"] < 500) {
                $errors[] = 'Kính thước file quá lớn';
            }
                $name_image = time() . '-' . $_FILES["image"]["name"];
                $path_image = ROOT_PATH .'/uploads/' . $name_image;
                $type_file = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
                $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif','jfif');
            if (!in_array(strtolower($type_file), $type_fileAllow)) {
                $errors[] = 'File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh';
            }
        }

            $create[] = 'null';
            if($category_id != '') {
                $create[] = $category_id;
            }
            if($name != '') {
                $create[] = "'" . $name . "'";
            }
            if($status != '') {
                $create[] = "'" . $status . "'";
            }
                $create[] = "'" . $name_image . "'";
            if($picture != '') {
                $create[] = "'" . $picture . "'";
            }
            if($decription != '') {
                $create[] = "'" . $decription . "'";
            }
            if($detail != '') {
                $create[] = "'" . $detail . "'";
            }
            if($price != '') {
                $create[] = $price;
            }
            if($created != '') {
                $create[] = $created;
            }
        


        if(count($errors) == 0) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
            
            $db->create($create);
            session_start();
            $_SESSION["message"] = "Đã thêm thành công";
            header("Location: $base_url/admin");
        }
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

                    <label for="fname">category_id</label>
                    <input type="text" id="fname" name="category_id" value="<?php if(isset($category_id)) { echo $category_id; } ?>"><br>

                    <label for="fname">Name</label>
                    <input type="text" id="fname" name="name" value="<?php if(isset($name)) { echo $name; } ?>"><br>

                    <label for="fname">status</label>
                        <select name="status">
                            <option value="New" >New</option>
                            <option value="Used" >Used</option>
                        </select>

                    <label for="lname">image</label>
                    <input type="file" name="image">
                    </br>

                    <label for="fname">picture</label>
                    <input type="text" id="fname" name="picture" value="<?php if(isset($picture)) { echo $picture; } ?>"><br>
                    
                    <label for="fname">decription</label>
                    <input type="text" id="fname" name="decription" value="<?php if(isset($decription)) { echo $decription; } ?>"><br>

                    <label for="fname">detail</label>
                    <input type="text" id="fname" name="detail" value="<?php if(isset($detail)) { echo $detail; } ?>"><br>

                    <label for="fname">price</label>
                    <input type="text" id="fname" name="price" value="<?php if(isset($price)) { echo $price; } ?>"><br>

                    <label for="fname">created</label>
                    <input type="text" id="fname" name="created" value="<?php if(isset($created)) { echo $created; } ?>"><br>

                    <input type="submit" value="Submit">
                    <a href="<?= $base_url ?>/admin">Trở về</a>
                </form>

</html>