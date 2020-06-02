@extends('site.main')

@section('content')
<?php
    $prefix     = 'product';
    $name_model = 'gio hang';
    $link_image = url("uploads/admin/{$prefix}");
?>
<form action="cart/update/" method="get" >
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="home">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@if(Session::has('cart'))
					@foreach($product_cart as $product)
						<tr>
							<td class="cart_product">
								<a href="{{$prefix}}/detail/{{$product['item']['id']}}"><img src="{{$link_image}}/{{$product['item']['image']}}" height="45" width="45" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="{{$prefix}}/detail/{{$product['item']['id']}}">{{$product['item']['name']}}</a></h4>
								<p>Product ID: {{$product['item']['id']}}</p>
							</td>
							<td class="cart_price">
								<p>{{formatNumber($product['item']['price'])}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input type="hidden" name="ids[{{$product['item']['id']}}]" value="{{$product['item']['id']}}">
									<label for="quantity">Qty</label>
									<input type="number" name="qtys[{{$product['item']['id']}}]" id="quantity" value="{{$product['qty']}}"  min="1" max="20">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{formatNumber($product['price'])}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="cart/remove/{{$product['item']['id']}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

					@endforeach
					@endif
					</tbody>
						<tr>
							<td>
							</td>
							<td>
							</td>
							<td>
							</td>
							<td>
								<label>Total Price :</label>
							</td>
							<td class="cart_total">
							@if(Session::has('cart'))
								<p class="cart_total_price">{{formatNumber($totalPrice)}}</p>
							@endif
							</td>
						</tr>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			
				<div class="row">
					<div class="col-sm-5">
						<div class="chose_area">
							<ul class="user_option">
								<li>
									<input type="checkbox">
									<label>Use Coupon Code</label>
								</li>
								<li>
									<input type="checkbox">
									<label>Use Gift Voucher</label>
								</li>
								<li>
									<input type="checkbox">
									<label>Estimate Shipping & Taxes</label>
								</li>
							</ul>
							<ul class="user_info">
								<li class="single_field">
									<label>Country:</label>
									<input type="text">
								</li>
								<li class="single_field">
									<label>Region / State:</label>
									<input type="text">
								</li>
								<li class="single_field">
									<label>Zip Code:</label>
									<input type="text">
								</li>
							</ul>
							<a class="btn btn-default update" href="">Get Quotes</a>
							<a class="btn btn-default check_out" href="">Continue</a>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="total_area">
							<ul>
							@if(Session::has('cart'))
							@foreach($product_cart as $product)
								<li>{{$product['item']['name']}} X {{$product['qty']}}<span>{{formatNumber($product['price'])}}</span></li>
							@endforeach
							@endif
								<li>Shipping Cost <span>Free</span></li>
							@if(Session::has('cart'))
								<li>Total <span>{{formatNumber($totalPrice)}}</span></li>
							@endif
							</ul>
								<button class="btn btn-default update" type="submit" name="submit">Update Cart</button>
								<a href="checkout" class="btn btn-default check_out">Checkout</a>
						</div>
					</div>
				</div>
			
		</div>
	</section><!--/#do_action-->
</form>
@endsection