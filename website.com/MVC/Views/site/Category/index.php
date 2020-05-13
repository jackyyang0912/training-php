<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <?php
                $xhtml = '';
                $xhtml2 = '';
                if($this->list_category) {
                    foreach($this->list_category as $obj) {
                        $image = BASE_PATH . 'uploads' . DS . $obj->image;         
                $xhtml .= '
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="'. BASE_PATH. 'index.php?controller=product&action=index&id='.$obj->id.'">'.$obj->name.'</a></h4>
                    </div>
                </div>';
                            
                $xhtml2 .= '
                <li><a href="'. BASE_PATH. 'index.php?controller=home&action=index&id='.$obj->id.'" data-toggle="">'.$obj->name.'</a></li>
                ';
                    }
                }
                echo $xhtml;
            ?>
        </div><!--/category-products-->
    
        
        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                    <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                    <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->
        
        <div class="shipping text-center"><!--shipping-->
            <img src="<?= BASE_PATH ?>public/site/images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->
    </div>
</div>