<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Shop</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?= BASE_PATH ?>/public/site/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>/public/site/css/core-style.css">
    <link rel="stylesheet" href="<?= BASE_PATH ?>/public/site/style.css">

</head>

<body>
            <?php include("./views/site/elements/search.php");?>
    


    <div class="main-content-wrapper d-flex clearfix">

            <?php
                include("./views/site/elements/header.php");
                
                include("./views/site/$this->template.php");
            ?>

    </div>

            <?php 
                include("./views/site/elements/newletter.php"); 
                include("./views/site/elements/footer.php"); 
            ?>

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="<?= BASE_PATH ?>/public/site/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?= BASE_PATH ?>/public/site/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= BASE_PATH ?>/public/site/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="<?= BASE_PATH ?>/public/site/js/plugins.js"></script>
    <!-- Active js -->
    <script src="<?= BASE_PATH ?>/public/site/js/active.js"></script>

</body>

</html>