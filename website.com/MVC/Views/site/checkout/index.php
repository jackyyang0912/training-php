<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="checkout_details_area mt-50 clearfix">
                    <div class="cart-title">
                        <h2>Checkout</h2>
                    </div>

                    <form action="<?= BASE_PATH . 'index.php?controller=order&action=add' ?>" method="POST">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label>Contact Name :</label>
                                <input type="text" class="form-control" name="name"  value="">
                            </div>
                      
                            <div class="col-12 mb-3">
                                <label>Shipping Address :</label>
                                <input type="text" class="form-control mb-3" name="address"  value="">
                            </div>
                 
                            <div class="col-md-6 mb-3">
                                <label>Deliver date :</label>
                                <input type="date" class="form-control" name="deliver_date"  value="">
                            </div>

                            <div class="col-12">
                                <div class="custom-control custom-checkbox d-block mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                </div>
                                <div class="custom-control custom-checkbox d-block">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">Ship to a different address</label>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">

                    <?php
                        $xhtml = '';
                        $total = 0;
                        if($this->data) {
                            foreach($this->data as $key => $val) {
                                $image = BASE_PATH . 'uploads' . DS . $val['product']->image;
                                $totalRow = $val['product']->price*$val['qty'];
                                $total += $totalRow;
                                $url_delete = BASE_PATH . 'index.php?controller=cart&action=delete&id='. $val['id'];
                                $xhtml .=   '<li><span>'.$val['product']->name.' X '.$val['qty'].'</span> <span>'.Helper::formatNumber($totalRow).'</span></li>';
                            }
                        }
                        echo $xhtml;
                    ?>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><b><span>Total :</span></b> <span><b><?= Helper::formatNumber($total) ?></b></span></li>
                    </ul>

                    <div class="payment-method">
                        <!-- Cash on delivery -->
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="cod" checked>
                            <label class="custom-control-label" for="cod">Cash on Delivery</label>
                        </div>
                        <!-- Paypal -->
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="paypal">
                            <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="img/core-img/paypal.png" alt=""></label>
                        </div>
                    </div>

                    <div class="cart-btn mt-100">
                        <button class="btn amado-btn w-100" type="submit" name="submit">Checkout</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>