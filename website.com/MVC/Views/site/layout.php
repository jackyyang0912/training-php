<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="<?= BASE_PATH ?>public/site/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_PATH ?>public/site/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= BASE_PATH ?>public/site/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= BASE_PATH ?>public/site/css/price-range.css" rel="stylesheet">
    <link href="<?= BASE_PATH ?>public/site/css/animate.css" rel="stylesheet">
	<link href="<?= BASE_PATH ?>public/site/css/main.css" rel="stylesheet">
	<link href="<?= BASE_PATH ?>public/site/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?= BASE_PATH ?>public/site/js/html5shiv.js"></script>
    <script src="<?= BASE_PATH ?>public/site/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?= BASE_PATH ?>public/site/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= BASE_PATH ?>public/site/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= BASE_PATH ?>public/site/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= BASE_PATH ?>public/site/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= BASE_PATH ?>public/site/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

	<?php 
			include("./views/site/elements/header.php");
	?>

	
	<section>
		<div class="container">
			<div class="row">
				<?php
				include("./views/site/$this->template.php");
				?>
			</div>
		</div>
	</section>
	

	
	<?php 
		include("./views/site/elements/footer.php");
	?>
  
    <script src="<?= BASE_PATH ?>public/site/js/jquery.js"></script>
	<script src="<?= BASE_PATH ?>public/site/js/bootstrap.min.js"></script>
	<script src="<?= BASE_PATH ?>public/site/js/jquery.scrollUp.min.js"></script>
	<script src="<?= BASE_PATH ?>public/site/js/price-range.js"></script>
    <script src="<?= BASE_PATH ?>public/site/js/jquery.prettyPhoto.js"></script>
    <script src="<?= BASE_PATH ?>public/site/js/main.js"></script>
</body>
</html>