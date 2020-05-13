<?php 
    include("./views/site/elements/slider.php");
    include("./views/site/Category/index.php");
?>

<div class="col-sm-9 padding-right">    
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>

        <?php
            $xhtml = '';
            if($this->list_product_featured) {
                foreach($this->list_product_featured as $obj) {
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
    
    <div class="category-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <?php
                echo $xhtml2;
            ?>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="tshirt" >
                <?php
                    $xhtml = '';
                    if($this->list_product) {
                        foreach($this->list_product as $obj) {
                            $image = BASE_PATH . 'uploads' . DS . $obj->image;         
                    $xhtml .= '
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="'.$image.'" alt="" />
                                <h2>'.Helper::formatNumber($obj->price).'</h2>
                                <p><a href="'. BASE_PATH. 'index.php?controller=product&action=detail&id='.$obj->id.'" >'.$obj->name.'</a></p>
                                <a href="'. BASE_PATH. 'index.php?controller=cart&action=add&id='.$obj->id.'"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
            
        </div>
    </div><!--/category-tab-->
    
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>
        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <?php
                $xhtml = '';
                if($this->list_product_recommend) {
                    foreach($this->list_product_recommend as $obj) {
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
                                    <a href="'. BASE_PATH. 'index.php?controller=cart&action=add&id='.$obj->id.'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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

        </div>
    </div><!--/recommended_items-->
</div>	