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

                    <?php
                        include("./views/elements/navbar.php");                   
                    ?>
                    <?php
                        include("./views/elements/sidebar.php");
                    ?>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">

                    <?php
                        include("./views/$this->template.php");
                    ?>

                </div>
            </div>
        </div>
    </div>

                    <?php
                        include("./views/elements/footer.php");
                    ?>

    <script src="<?= BASE_PATH ?>public/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="<?= BASE_PATH ?>public/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
</body>
</html>