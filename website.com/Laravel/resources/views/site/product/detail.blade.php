@extends('site.main')

@section('content')

@include('site.category.index')
<?php
    $prefix     = 'product';
    $name_model = 'sản phẩm';
    $link_image = url("uploads/admin/{$prefix}");
?>
<div class="col-sm-9 padding-right">

	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">
				<img src="{{$link_image}}/{{$item->image}}"  alt=""  />
				<h3>ZOOM</h3>
			</div>
		</div>
		<div class="col-sm-7">
		<form  action="cart/add/{{$item->id}}" method="GET">
		
			<div class="product-information"><!--/product-information-->
				<img src="site/images/product-details/new.jpg"  class="newarrival" alt="" />
				<h2>{{$item->name}}</h2>
				<p>Product ID: {{$item->id}}</p>
				<img src="site/images/product-details/rating.png" alt="" />
				<span>
					<span>{{formatNumber($item->price)}}</span>
					<label>Quantity:</label>
						<input type="hidden" name="id" value="{{$item->id}}">
						<input type="number" name="qty"  value="1" min="1" max="300" placeholder=1>
					<button type="submit" name="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
				</span>
				<p><b>Detail:</b>{{$item->detail}}</p>
				<a href=""><img src="site/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
			</div><!--/product-information-->
			</form>
		</div>
	</div><!--/product-details-->


	<div class="recommended_items"><!--recommended_items-->
		<h2 class="title text-center">Related items</h2>
	
	
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			@foreach($related_items as $rlt)
				<div class="item active">	
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{$link_image}}/{{$rlt->image}}" alt="" height="250px" />
									<h2>{{formatNumber($rlt->price)}}</h2>
									<p><a href="" >{{$rlt->name}}</a></p>
									<button type="button" class="btn btn-default add-to-cart">
										<i class="fa fa-shopping-cart">
											<a href="cart/add/{{$rlt->id}}" >Add to cart</a> 
										</i> 
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="item">	
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{$link_image}}/{{$rlt->image}}" alt="" height="250px" />
									<h2>{{formatNumber($rlt->price)}}</h2>
									<p><a href="{{$prefix}}/detail/{{$item->id}}" >{{$rlt->name}}</a></p>
									<button type="button" class="btn btn-default add-to-cart">
										<i class="fa fa-shopping-cart">
											<a href="cart/add/{{$rlt->id}}" >Add to cart</a> 
										</i> 
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
	
			</div>
				<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
				</a>
				<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
				</a>			
		</div>
		
	</div><!--/recommended_items-->
</div>

@endsection
