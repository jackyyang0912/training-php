


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<form action="<?= BASE_PATH . 'index.php?controller=cart&action=update' ?>" method="POST" >
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
                                            <input type="hidden" name="ids[]" value="'.$val['id'].'">
                                            <input type="number" name="qtys[]" id="quantity" value="'.$val['qty'].'"  min="1" max="20">
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
								$xhtml2 .='<li>'.$val['product']->name.' X '.$val['qty'].'<span>'.Helper::formatNumber($totalRow).'</span></li>';
							}
						}
						echo $xhtml;
					?>    
					</tbody>
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
								<?php echo $xhtml2; ?>
								<li>Shipping Cost <span>Free</span></li>
								<li>Total <span><?= Helper::formatNumber($total) ?></span></li>
							</ul>
								<button class="btn btn-default update" type="submit" name="submit">Update Cart</button>
								<a href="<?= BASE_PATH . 'index.php?controller=order&action=index' ?>" class="btn btn-default check_out">Checkout</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section><!--/#do_action-->

