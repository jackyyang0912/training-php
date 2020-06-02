
@extends('site.main')

@section('content')
<?php
    $prefix     = 'product';
    $name_model = 'cart';
    $link_image = url("uploads/admin/{$prefix}");
?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			@if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Name">
								<input type="text" placeholder="Username">
								<input type="text" placeholder="Address">
								<input type="text" placeholder="Phone">
								<input type="text" placeholder="Email">
							</form>

						</div>
					</div>
					
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action="checkout" method="POST">
								@csrf
									<input type="text" name="name" placeholder="Name" value="">
									<input type="text" name="address" placeholder="Adress" value="">
									<input type="text" name="phone" placeholder="Phone" value="">
									<input type="text" name="email" placeholder="Email" value="">
									<input type="date" name="deliver_date"  value="">
								
							</div>
							
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
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
								<a href="{{$prefix}}/detail/{{$product['item']['id']}}"><img src="{{$link_image}}/{{$product['item']['image']}}" height="42" width="42" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="{{$prefix}}/detail/{{$product['item']['id']}}">{{$product['item']['name']}}</a></h4>
								<p>Product ID:{{$product['item']['id']}}</p>
							</td>
							<td class="cart_price">
								<p>{{formatNumber($product['item']['price'])}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<label for="quantity">Qty: {{$product['qty']}}</label>
									
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
					
			
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
								@if(Session::has('cart'))
								@foreach($product_cart as $product)	
									<tr>
										<td>{{$product['item']['name']}} X {{$product['qty']}}</td>
										<td>{{formatNumber($product['price'])}}</td>
									</tr>
								@endforeach
								@endif
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
								@if(Session::has('cart'))
									<tr>
										<td>Total</td>
										
										<td><span>{{formatNumber($totalPrice)}}</span></td>
									</tr>
								@endif
								</table>
								<div class="cart-btn mt-100 active">
										<button class="btn btn-primary" type="submit" name="submit">Checkout</button>
								</div>
							</td>
						</tr>					

					</tbody>
				</table>
			</div>
			</form>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->
@endsection
	