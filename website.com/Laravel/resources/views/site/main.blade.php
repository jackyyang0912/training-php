<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Website.com|Laravel</title>

    <!-- include('site.link') -->
    <base href="{{asset('')}}">
    <link href="site/css/bootstrap.min.css" rel="stylesheet">
    <link href="site/css/font-awesome.min.css" rel="stylesheet">
    <link href="site/css/prettyPhoto.css" rel="stylesheet">
    <link href="site/css/price-range.css" rel="stylesheet">
    <link href="site/css/animate.css" rel="stylesheet">
	<link href="site/css/main.css" rel="stylesheet">
	<link href="site/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="site/js/html5shiv.js"></script>
    <script src="site/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="site/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="site/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="site/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="site/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="site/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

            @include('site.elements.header')

	<section>
		<div class="container">
			<div class="row">

                @yield('content')
         
			</div>
		</div>
	</section>
	
        @include('site.elements.footer')

    <script src="site/js/jquery.js"></script>
	<script src="site/js/bootstrap.min.js"></script>
	<script src="site/js/jquery.scrollUp.min.js"></script>
	<script src="site/js/price-range.js"></script>
    <script src="site/js/jquery.prettyPhoto.js"></script>
    <script src="site/js/main.js"></script>

        <!-- include('site.elements.script') -->
</body>
</html>