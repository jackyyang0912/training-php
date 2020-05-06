<div class="shop_sidebar_area">

    <!-- ##### Single Widget ##### -->
    <div class="widget catagory mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Catagories</h6>
<?php
    $xhtml = '';
    if($this->data) {
        foreach($this->data as $obj) {
            $image = BASE_PATH . 'uploads' . DS . $obj->image;         
    $xhtml .= '
        <!--  Catagories  -->
        <div class="catagories-menu">
            <ul>
                <li class=""><a href="'. BASE_PATH. 'index.php?controller=shop&action=index&id='.$obj->id.'">'.$obj->name.'</a></li>
            </ul>
        </div>
        ';
        }
    }
    echo $xhtml;
    ?>
    </div>
</div>

<div class="amado_product_area section-padding-100">
    <div class="container-fluid">
        
        <div class="row">
<?php
    if($this->errors){
        echo $this->errors;
    }
    $xhtml = '';
    if($this->data_product) {
        foreach($this->data_product as $obj) {
            $image = BASE_PATH . 'uploads' . DS . $obj->image;         
    $xhtml .= '
            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="'.$image.'" alt="">
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="'.$image.'" alt="">
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">'.Helper::formatNumber($obj->price).'</p>
                            <a href="'. BASE_PATH. 'index.php?controller=product&action=index&id='.$obj->id.'">
                                <h6>'.$obj->name.'</h6>
                            </a>
                        </div>

                        
                        <!-- Ratings & Cart -->
                        <div class="ratings-cart text-right">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="cart">
                                <a href="'. BASE_PATH. 'index.php?controller=cart&action=add&id='.$obj->id.'" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="'.BASE_PATH.'public/site/img/core-img/cart.png" alt=""></a>
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

        <div class="row">
            <div class="col-12">
                <!-- Pagination -->
                <nav aria-label="navigation">
                    <ul class="pagination justify-content-end mt-50">
                        <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                        <li class="page-item"><a class="page-link" href="#">02.</a></li>
                        <li class="page-item"><a class="page-link" href="#">03.</a></li>
                        <li class="page-item"><a class="page-link" href="#">04.</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>