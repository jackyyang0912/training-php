<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> website.com@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php?controller=home&action=index"><img src="site/images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Viet Nam
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="site/#">Hongkong</a></li>
									<li><a href="site/#">USA</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VND
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="site/#">Dollar</a></li>
									<li><a href="site/#">RMB</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="index.php?controller=order&action=index"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="index.php?controller=cart&action=index"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								
								<?php
									if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
								?>
									<?php
									foreach($_SESSION['user'] as $val){}
										if($val->level >= 2) {
											
									?>
										<li><a href="index.php?module=admin&controller=product&action=index"><i class="fa fa-lock"></i> Admin</a></li>
										<li><a href="index.php?controller=user&action=logout"><i class="fa fa-lock"></i> Logout</a></li>
									<?php }else { ?>

										<li><a href="index.php?controller=user&action=index"><i class="fa fa-user"></i> Profile</a></li>
										<li class="nav-item"><a class="nav-link" href="'index.php?controller=user&action=logout' ?>">Logout</a></li>
									<?php } ?>
								<?php }else { ?>
									<li><a href="index.php?controller=user&action=login"><i class="fa fa-lock"></i> Login</a></li>
							
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{route('home')}}" class="active">Home</a></li>
								<li class="dropdown"><a href="{{route('product')}}">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{route('product')}}">Products</a></li>
										<li><a href="{{route('productdetail')}}">Product Details</a></li> 
										<li><a href="{{route('checkout')}}">Checkout</a></li> 
										<li><a href="{{route('cart')}}">Cart</a></li> 
										<li><a href="{{route('login')}}">Login</a></li> 

                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Blog List</a></li>
										<li><a href="#">Blog Single</a></li>
                                    </ul>
                                </li> 
							
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->