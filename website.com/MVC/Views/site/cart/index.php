<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>
                <form action="<?= BASE_PATH . 'index.php?controller=cart&action=update' ?>" method="POST" >
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
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
                                <td class="cart_product_img">
                                    <a href="#"><img src="'.$image.'" alt="Product"></a>
                                </td>
                                <td class="cart_product_desc">
                                    <h5>'.$val['product']->name.'</h5>
                                </td>
                                <td class="price">
                                    <span>'.Helper::formatNumber($val['product']->price).'</span>
                                </td>
                                
                                <td class="qty">
                                    <div class="qty-btn d-flex">
                                        <div class="quantity">
                                            <label for="quantity">Qty</label>
                                            <input type="hidden" name="ids[]" value="'.$val['id'].'">
                                            <input type="number" name="qtys[]" id="quantity" value="'.$val['qty'].'"  min="1" max="20">
                                        </div>
                                    </div>
                                </td>
                                <td class="total">
                                    <span>'.Helper::formatNumber($totalRow).'</span>
                                </td>
                                <td><a href="'.$url_delete.'"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            ';

                            $xhtml2 .='<li><span>'.$val['product']->name.' X '.$val['qty'].'</span> <span>'.Helper::formatNumber($totalRow).'</span></li>';
                        }
                    }
                    echo $xhtml;
                ?>           

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                    <?php echo $xhtml2; ?>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>total:</span> <span><?= Helper::formatNumber($total) ?></span></li>
                    </ul>
                    <div class="cart-btn mt-100">
                        <button class="btn amado-btn w-49" type="submit" name="submit">Update Cart</button>
                        <a href="<?= BASE_PATH . 'index.php?controller=order&action=index' ?>" class="btn amado-btn w-49">Checkout</a>
                    </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>