
<?php 
    include("./views/site/Category/index.php");
?>
<div class="col-sm-9 padding-right">    
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Products</h2>

        <?php
            if(isset($this->errors)){
                echo $this->errors;
            }
            $xhtml = '';
            if($this->list_product) {
                foreach($this->list_product as $obj) {
                    $image = BASE_PATH . 'uploads' . DS . $obj->image;         
            $xhtml .= '
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="'.$image.'" alt="" />
                            <h2>'.Helper::formatNumber($obj->price).'</h2>
                            <p><a href="'. BASE_PATH. 'index.php?controller=product&action=detail&id='.$obj->id.'" >'.$obj->name.'</a></p>
                            <a href="'. BASE_PATH. 'index.php?controller=cart&action=add&id='.$obj->id.'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                </div>
            </div>
        </div>
                    ';
                }
            }
            echo $xhtml;
        ?>
    </div><!--features_items-->
    

    

</div>	