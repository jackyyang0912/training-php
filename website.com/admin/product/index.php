<?php
    //Kết nối SQL
        require_once ('./../libs/database.php');
        $connect = connect_db();
        require_once('./../libs/DB.php');
        $db = new DB();

    //Kiểm tra tồn tại giá trị tìm kiếm
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $price_min = isset($_GET['price_min']) ? $_GET['price_min'] : '';
        $price_max = isset($_GET['price_max']) ? $_GET['price_max'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';
        $submit_status = isset($_GET['submit_status']) ? $_GET['submit_status'] : '';

    //Tìm kiếm theo id và name và price và status (flag_where)
        $where= [];
        if($id != '') {
            $where[] = ['id', '=', $id];
        }
        if($name != '') {
            $where[] = ['name', '=', $name];
        }
        if($price_min != '') {
            $where[] = ['price', '>', $name];
        }
        if($price_max != '') {
            $where[] = ['price', '<', $price_max];
        }
        if($status != '') {
            $where[] = ['status', '=', $status];
        }


    //Xóa nhiều id
        if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
            $ids = $_POST['ids'];
            $db->delete($ids);
            $_SESSION["message"] = "Đã xóa thành công id =";
        }

    
    $data = $db->selectAll($where);
?>
<!DOCTYPE html>
<html>
<head>
    <title> product </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" href="<?= $base_url ?>/public/styles.css">
</head>
<body>
    <h3 >Welcome <?php echo $_SESSION["username"] ?>, Click here to <a href = "<?= $base_url ?>/admin/logout.php">Log out</a></h2> 
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
            <a href="<?= $base_url ?>/admin/index.php?controller=product&action=create">Thêm mới</a>
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
                if($data) {
                    foreach($data as $obj) {
            ?>
            <tr>
                <td>
                    <input type="checkbox" name="ids[]" value="<?php echo $obj->id; ?>" >
                </td>
                <td><?php echo $obj->id;?></td>
                <td><?php echo $obj->category_id; ?></td>
                <td>
                    <p><img src="<?= $base_url ?>/uploads/<?= $obj->image?>" width="50" height="50"></p>
                    <?php echo $obj->name; ?>
                </td>
                <td>
                    <button><a href = '<?= $base_url ?>/admin/index.php?controller=product&action=edit&id=<?php echo $obj->id;echo "&status=".$obj->status;?>'><?= $obj->status; ?></a></button>
                </td>
                <td><?php echo $obj->picture; ?></td>
                <td><?php echo $obj->decription; ?></td>
                <td><?php echo $obj->detail; ?></td>
                <td><?php echo $obj->price; ?></td>
                <td><?php echo $obj->created; ?></td>
                <td>
                    <button><a href = '<?= $base_url ?>/admin/index.php?controller=product&action=delete&id=<?php echo $obj->id;?>'> Xoá</a></button>
                    <button><a href = '<?= $base_url ?>/admin/index.php?controller=product&action=edit&id=<?php echo $obj->id;?>'> Sửa</a></button>
                </td>
            </tr>
            <?php } }?>
        </table>
        <div>
            <input type="submit" name="submit-multi-id" value="Xóa">
        </div>
    </form>
</body>
</html>
