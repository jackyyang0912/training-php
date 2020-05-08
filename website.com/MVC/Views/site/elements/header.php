<header class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">

                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active"><a class="nav-link" href="<?= BASE_PATH ?>index.php?controller=home&action=index">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?= BASE_PATH ?>index.php?controller=shop&action=index">Shop</a></li>
                            
                          
                                        <?php
                                            if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
                                        ?>
                                            <?php
                                            foreach($_SESSION['user'] as $val){}
                                                if($val->level >= 2) {
                                                    
                                            ?>
                                                <li class="nav-item"><a class="nav-link" href="<?= BASE_PATH . 'index.php?module=admin&controller=product&action=index' ?>">Admin</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= BASE_PATH . 'index.php?controller=user&action=logout' ?>">Logout</a></li>
                                            <?php }else { ?>

                                                <li class="nav-item"><a class="nav-link" href="<?= BASE_PATH . 'index.php?controller=user&action=profile' ?>">Profile</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= BASE_PATH . 'index.php?controller=user&action=logout' ?>">Logout</a></li>
                                            <?php } ?>
                                        <?php }else { ?>
                                            <li class="nav-item"><a class="nav-link" href="<?= BASE_PATH . 'index.php?controller=user&action=login' ?>">Đăng nhập</a></li>
                                            <li class="nav-item"><a class="nav-link" href="<?= BASE_PATH . 'index.php?controller=user&action=register' ?>">Đăng ký</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>