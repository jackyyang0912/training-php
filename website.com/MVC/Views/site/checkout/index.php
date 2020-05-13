
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

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
			<?php
				if(isset($this->user)){
				} 
			?>
			
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="<?= $this->user->name ?>">
								<input type="text" placeholder="<?= $this->user->username ?>">
								<input type="text" placeholder="<?= $this->user->address ?>">
								<input type="text" placeholder="<?= $this->user->phone ?>">
								<input type="text" placeholder="<?= $this->user->email ?>">
							</form>

						</div>
					</div>
					
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action="<?= BASE_PATH . 'index.php?controller=order&action=add' ?>" method="POST">
									<input type="text" name="name" placeholder="<?= $this->user->name ?>" value="<?= $this->user->name ?>">
									<input type="text" name="address" placeholder="<?= $this->user->address ?>" value="<?= $this->user->address ?>">
									<input type="text" name="phone" placeholder="<?= $this->user->phone ?>" value="<?= $this->user->phone ?>">
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
					<?php
						$xhtml = '';
						$xhtml2 = '';
						$total = 0;
						if($this->data) {
							foreach($this->data as $key => $val) {
								$image = BASE_PATH . 'uploads' . DS . $val['product']->image;
								$totalRow = $val['product']->price*$val['qty'];
								$total += $totalRow;
								$url_delete = BASE_PATH . 'index.php?controller=cart&action=delete&id='. $val['id'];
								$xhtml .=   '
						<tr>
							<td class="cart_product">
								<a href=""><img src="'.$image.'" height="42" width="42" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="'. BASE_PATH. 'index.php?controller=product&action=detail&id='.$val['product']->id.'">'.$val['product']->name.'</a></h4>
								<p>Product ID:'.$val['product']->id.'</p>
							</td>
							<td class="cart_price">
								<p>'.Helper::formatNumber($val['product']->price).'</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<label for="quantity">Qty</label>
									<p>'.$val['qty'].'</p>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">'.Helper::formatNumber($totalRow).'</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="'.$url_delete.'"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						';
						$xhtml2 .='
							<tr>
								<td>'.$val['product']->name.' X '.$val['qty'].'</td>
								<td>'.Helper::formatNumber($totalRow).'</td>
							</tr>
						';
					}
				}
				echo $xhtml;
			?>    						
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<?php echo $xhtml2; ?>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span><?= Helper::formatNumber($total) ?></span></td>
									</tr>
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

	