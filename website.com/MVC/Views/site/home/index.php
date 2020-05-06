        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">


            <?php
                $xhtml = '';
                if($this->data) {
                    foreach($this->data as $key => $obj) {
                        if($key == 9){
                        break;
                        }
                        $image = BASE_PATH . 'uploads' . DS . $obj->image;         
                $xhtml .= ' <div class="single-products-catagory clearfix">
                            <a href="'.BASE_PATH.'index.php?controller=product&action=index&id='.$obj->id.'">
                                <img src="' .$image. '" alt="">
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <div class="line"></div>
                                    <p>From '.Helper::formatNumber($obj->price).'</p>
                                    <h4>'.$obj->name.'</h4>
                                </div>
                            </a>
                        </div> ';
                    }
                }
                echo $xhtml;
            ?>


            </div>
        </div>