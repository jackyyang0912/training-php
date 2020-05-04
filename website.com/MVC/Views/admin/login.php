<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?= BASE_PATH ?>public/admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a><img class="logo-img" >WEBSITE.COM</a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
            <?php
                if(isset($this->errors) && !empty($this->errors)) { 
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
                <form action="<?=BASE_PATH . 'index.php?module=admin&controller=user&action=login'?>" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="username" placeholder="Username" >
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Password">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>

        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?= BASE_PATH ?>public/admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?= BASE_PATH ?>public/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>