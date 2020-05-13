

<?php 
    include("./views/site/Category/index.php");
?>
				
<div class="col-sm-9 padding-right">
<?php
	$xhtml = '';
	if($this->data) {
		foreach($this->data as $obj) {
			$image = BASE_PATH . 'uploads' . DS . $obj->image;         
	$xhtml .= '
	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">
				<img src="'.$image.'"  alt=""  />
				<h3>ZOOM</h3>
			</div>
		</div>
		<div class="col-sm-7">
		<form  action="'.BASE_PATH . 'index.php?controller=cart&action=add" method="GET">
			<div class="product-information"><!--/product-information-->
				<img src="'.BASE_PATH.'public/site/images/product-details/new.jpg"  class="newarrival" alt="" />
				<h2>'.$obj->name.'</h2>
				<p>Product ID: '.$obj->id.'</p>
				<img src="'.BASE_PATH.'public/site/images/product-details/rating.png" alt="" />
				<span>
					<span>'.Helper::formatNumber($obj->id).'</span>
					<label>Quantity:</label>
						<input type="hidden" name="controller" value="cart">
						<input type="hidden" name="action" value="add">
						<input type="hidden" name="id" value="'.$obj->id.'">
						<input type="number" name="qty" value="1"  min="1" max="300" placeholder=1>
					<button type="submit" name="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
				</span>
				<p><b>Detail:</b>'.$obj->detail.'</p>
				<a href=""><img src="'.BASE_PATH.'public/site/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
			</div><!--/product-information-->
			</form>
		</div>
	</div><!--/product-details-->
			';
		}
	}
	echo $xhtml;
?>

	<div class="recommended_items"><!--recommended_items-->
		<h2 class="title text-center">Related items</h2>
		
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			<?php
				$xhtml = '';
				if(isset($this->related)) {
					foreach($this->related as $obj) {
						$image = BASE_PATH . 'uploads' . DS . $obj->image;         
				$xhtml .= '	
				<div class="item active">	
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="'.$image.'" alt="" />
									<h2>'.Helper::formatNumber($obj->price).'</h2>
									<p><a href="'. BASE_PATH. 'index.php?controller=product&action=detail&id='.$obj->id.'" >'.$obj->name.'</a></p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
									<img src="'.$image.'" alt="" />
									<h2>'.Helper::formatNumber($obj->price).'</h2>
									<p><a href="'. BASE_PATH. 'index.php?controller=product&action=detail&id='.$obj->id.'" >'.$obj->name.'</a></p>
									<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
								</div>
							</div>
						</div>
					</div>
				</div>
						';
					}
				}
				echo $xhtml;
			?>
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

	
