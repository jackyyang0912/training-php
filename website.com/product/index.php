

<!DOCTYPE html>
<html>
<head>
    <title> product </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" href="http://localhost/training-php/website.com/public/styles.css">
</head>
<body>
    <?php
    session_start();

    // Check if the user is logged in, if not then redirect to login page
    if(!isset($_SESSION["is_login"]) || $_SESSION["is_login"] !== true){
    echo 'Không đc phép vô đây';
    }?>
    
    <h3>Click here to <a href = "http://localhost/training-php/website.com/login.php">Log In</a></h2> 
    
    <?php
    //Kết nối SQL
        require_once ('./../libs/database.php');
        $connect = connect_db();

        

    //Kiểm tra tồn tại giá trị tìm kiếm
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $name = isset($_GET['name']) ? $_GET['name'] : '';
            $price_min = isset($_GET['price_min']) ? $_GET['price_min'] : '';
            $price_max = isset($_GET['price_max']) ? $_GET['price_max'] : '';
            $status = isset($_GET['status']) ? $_GET['status'] : '';

    //Tìm kiếm theo id và name và price và status (flag_where)
            $sql = "SELECT * FROM product"; //$str1 . $str2
            $flag_where = false;
            if($id != '') {
                $sql .= " where id = $id";
                $flag_where = true;
            }
            if($name != '') {
                if($flag_where) {
                $sql .= " AND `name` = '$name' ";
                }else {
                $sql .= " WHERE  `name` = '$name' ";
                $flag_where = true;
                }
            }
            if($price_min != '') {
                if($flag_where) {
                $sql .= " AND price > '$price_min'";
                }else {
                $sql .= " WHERE price > '$price_min'";
                $flag_where = true;
                }
            }
            if($price_max != '') {
                if ($price_min > $price_max){
                    $_SESSION["message"] = "Xin kiểm tra lại giá trị tìm kiếm";
                }else {
                    if($flag_where) {
                    $sql .= " AND price < '$price_max'";
                    }else {
                        $sql .= " WHERE price < '$price_max'";
                        $flag_where = true;
                    }
                }
            }
            if($status != '') {
                if($flag_where) {
                    $sql .= " AND status = '$status'";
                }else {
                    $sql .= " WHERE status = '$status'";
                    $flag_where = true;
                }
            }



        //Xóa nhiều id
            if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
                $ids = $_POST['ids'];
                foreach($ids as $id) {
                   $query = 'DELETE FROM product WHERE id = ' . $id;
                   mysqli_query($connect, $query);
                   $_SESSION["message"] = "Đã xóa thành công id =";
               }
            }
        
        //Kiểm tra câu sql 
        echo $sql;
            $resurt = mysqli_query ($connect, $sql );

    ?>
    <h2> DANH SÁCH ĐƠN HÀNG </h2>
            <!-- form Tìm kiếm -->
    <a><b>Tìm kiếm Sản phẩm : </b></a><br><br>
    <div>
        <form action="" method="GET">
            <div>
                <label for="fname">Tìm Mã ID</label><br>
                <input type="text" name="id" value="<?php $id ?>" placeholder="Mã ID">
            </div>
            <div>
                <label for="fname">Tìm Tên Sản phẩm</label><br>
                <input type="text" name="name" value="<?php $name ?>" placeholder="Tên Sản phẩm">
            </div>
            <div>
                <label for="fname">Tìm Giá Sản phẩm :</label><br>
                <label for="fname">Từ</label>
                <input type="number" name="price_min" value="<?php $price_min ?>" min="0"  placeholder="0 vnđ">
                <label for="fname">Đến</label>
                <input type="number" name="price_max" value="<?php $price_max ?>"  placeholder= "vnđ"><br><br>
            </div>
            <div>
                <label for="fname">Tình trạng Sản phẩm</label><br>
                <select name="status">
                    <option value=""></option>
                    <option value="new">New</option>
                    <option value="used">Used</option>
                </select>
            </div>
            <div>
                <input type="submit" name="submit" value="Tìm kiếm">
            </div>
        </form>
    </div>
    <br>

    <!-- Form xóa nhiều id -->
    <form action="" method="POST">
        <div>
            <a href="http://localhost/training-php/website.com/product/create.php">Thêm mới</a>
        </div>
            <?php 
                    if(isset($_SESSION['message'])) { 
            ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <?php 
                            if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
                                $ids = $_POST['ids'];
                                foreach($ids as $id) {
                                    echo  $_SESSION['message'] . $id . '<br>';        
                               }    unset($_SESSION['message']);
                            }
                            if(isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                        ?>
                    </div>
            <?php   } ?>
        <table id = "customers" >
            <tr>
                <th></th>
                <th>id</th>
                <th>category_id</th>
                <th>name</th>
                <th>status</th>
                <th>picture</th>
                <th>decription</th>
                <th>detail</th>
                <th>price</th>
                <th>created</th>
                <th>Hành động</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($resurt)) {
            ?>
            <tr>
                <td>
                    <input type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>" >
                </td>
                <td><?php echo $row ['id'];?></td>
                <td><?php echo $row ['category_id']; ?></td>
                <td>
                    <p><img src="http://localhost/training-php/website.com/uploads/<?= $row['image'] ?>" width="50" height="50"></p>
                    <?php echo $row['name']; ?>
                </td>
                <td><?php echo $row ['status']; ?></td>
                <td><?php echo $row ['picture']; ?></td>
                <td><?php echo $row ['decription']; ?></td>
                <td><?php echo $row ['detail']; ?></td>
                <td><?php echo $row ['price']; ?></td>
                <td><?php echo $row ['created']; ?></td>
                <td>
                    <button><a href = 'http://localhost/training-php/website.com/product/delete.php?id=<?php echo $row ['id'];?>'> Xoá</a></button>
                    <button><a href = 'http://localhost/training-php/website.com/product/edit.php?id=<?php echo $row ['id'];?>'> Sửa</a></button>
                </td>
            </tr>
            <?php } ?>
        </table>
        <div>
            <input type="submit" name="submit-multi-id" value="Xóa">
        </div>
    </form>
</body>
</html>
