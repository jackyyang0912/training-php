Welcome to Trang Product/get<!doctype html>
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
                        <h1 class="h3 mb-2 text-gray-800">Thêm mới</h1>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                                
                        <?php
                            if($this->errors) { 
                        ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php
                                        foreach($this->errors as $vl) {
                                            echo '<li>'.$vl.'</li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        <?php
                            }
                        ?>
                            <form action="<?= BASE_PATH . 'index.php?controller=product&action=add' ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">     
                                        <div class="col-sm-2">
                                            <label>Chọn danh mục</label>
                                        </div>                          
                                        <div class="col-sm-2">
                                            <div class="input-group input-group-sm mb-3">
                                                <select name="category_id" class="form-control">
                                                    <?php if($this->data_category_product) { ?>
                                                        <?php foreach($this->data_category_product as $row) { ?>
                                                            <option value="<?= $row->id ?>"><?= $row->name ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="row">     
                                        <div class="col-sm-2">
                                            <label>Chọn trạng thái</label>
                                        </div>                          
                                        <div class="col-sm-2">
                                            <div class="input-group input-group-sm mb-3">
                                                <select name="status" class="form-control">
                                                    <option disabled >Chosse Status</option>
                                                    <option value="1" >Available</option>
                                                    <option value="0">Invailable</option>
                                                </select>
                                            </div> 
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nhập tên sản phẩm</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" name="name" class="form-control">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nhập giá</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" name="price" class="form-control">
                                            </div> 
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nhập decription</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <textarea name="decription" class="form-control" rows="5" id="comment" ></textarea>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nhập detail</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <textarea name="detail" class="form-control" rows="5" id="comment"></textarea>
                                            </div> 
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Chọn hình</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="file" name="image">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="submit" name="submit" class="btn-info btn-lg">Lưu</button>
                                            <button class="btn-info btn-lg" ><a href='<?= BASE_PATH ?>index.php?controller=product&action=index' >Hủy bỏ</a></button>
                                        </div>
                                    </div>
                                </div>    
                            </form>
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