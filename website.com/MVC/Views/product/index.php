<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= BASE_PATH ?>public/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Admin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>

                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= BASE_PATH ?>public/assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Admin
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Product <span class="badge badge-success">6</span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Order</a>
                            </li>

                            <li class="user">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="true" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-table"></i>User</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Product </h2>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
                        <form action="http://localhost/training-php/website.com/mvc/index.php?controller=product&action=index" method="GET">
                                <input type="hidden" name="controller" value="product">
                                <input type="hidden" name="action" value="index">
                            <div class="row">
                                <div class="col-sm-1">
                                    <input class="form-control "  name="id" value="<?= $this->id ?>" type="text" placeholder="ID">
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-control"  name="name" value="<?= $this->name ?>" type="text" placeholder="Name">
                                    
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control"  name="status" value="">
                                        <option disabled="" selected="">Chosse Status</option>
                                        <option value="1">Available</option>
                                        <option value="0">Invailable</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit"  class="btn-success btn-sm" id="ex3" >Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                <form action="<?=BASE_PATH . 'index.php?controller=product&action=delete'?>" method="POST">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th scope="col">STT</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Danh mục</th>
                                                <th scope="col">Tên sản phẩm</th>
                                                <th scope="col">Tình trạng</th>
                                                <th scope="col">Hình ảnh</th>
                                                <th scope="col">Mô tả</th>
                                                <th scope="col">Chi tiết</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Ngày đăng</th>
                                                <th scope="col">Chỉnh sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($this->data as $key => $obj) { ?>
                                                <tr>
                                                    <td><input type="checkbox" name="ids[]" value="<?php echo $obj->id; ?>" ></td>
                                                    <th scope="row"><?= $key + 1 ?></th>
                                                    
                                                    <td><?= $obj->id ?></td>
                                                    <td><?= $obj->category_id ?></td>
                                                    <td>
                                                        <p><img src="<?= UPLOADS.$obj->image?>" width="50" height="50"></p>
                                                        <?= $obj->name ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $url_status = BASE_PATH . 'index.php?controller=product&action=changeStatus&status=' . $obj->status . '&id=' . $obj->id;
                                                        ?>
                                                        <?php if($obj->status == 1) { ?>
                                                            <a href="<?= $url_status ?>" class="btn btn-info">Available</a>
                                                        <?php } else {?>
                                                            <a href="<?= $url_status ?>" class="btn btn-warning">Invailable</a>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $obj->picture ?></td>
                                                    <td><?= $obj->decription ?></td>
                                                    <td><?= $obj->detail ?></td>
                                                    <td><?= number_format("$obj->price") . "VND" ?></td>
                                                    <td><?= date("d/m/Y H:iA ", $obj->created + 50*12*30*24*60*60) ?></td>
                                                    <td>
                                                        <button type="button" class="btn-info btn-sm" ><a href = '<?=BASE_PATH . 'index.php?controller=product&action=delete'.'&id=' . $obj->id . '&image=' . $obj->image?>' > Xoá</a></button>
                                                        <button type="button" class="btn-info btn-sm" ><a href = '<?= $base_url ?>/admin/index.php?controller=product&action=edit&id=<?php echo $obj->id;?>'> Sửa</a></button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div>
                                        <input type="submit" name="submit-multi-id" class="btn-danger btn-sm" value="Xóa">
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="<?= BASE_PATH ?>public/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="<?= BASE_PATH ?>public/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>

</body>
 
</html>