        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">
        <?php 
            if(isset($this->data)){
                foreach($this->data as $key => $obj){
                }
                $image = BASE_PATH . 'uploads' . DS . $obj->image;
            }
        ?>
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="<?= BASE_PATH ?>index.php?controller=home&action=index">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_PATH ?>index.php?controller=shop&action=index">Category</a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_PATH ?>index.php?controller=product&action=index">Products</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $obj->name ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="<?= $image ?>">
                                            <img class="d-block w-100" src="<?= $image ?>" alt="First slide">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price"><?= Helper::formatNumber($obj->price) ?></p>
                                <a href="#">
                                    <h6><?= $obj->name ?></h6>
                                </a>

                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="review">
                                        <a href="#">Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>

                            <div class="short_overview my-5">
                                <p><?= $obj->detail ?></p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" action="<?= BASE_PATH . 'index.php?controller=cart&action=add' ?>" method="GET">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <input type="hidden" name="controller" value="cart">
                                        <input type="hidden" name="action" value="add">
                                        <input type="hidden" name="id" value="<?= $obj->id ?>">
                                        <input type="number" name="qty" value="1"  min="1" max="300" placeholder=1>
                                    </div>
                                </div>
                                <button type="submit" name="submit"  class="btn amado-btn"><a class="btn amado-btn">Add to Cart</a></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>