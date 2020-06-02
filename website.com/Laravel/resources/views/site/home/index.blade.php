@extends('site.main')

@section('content')

@include('site.elements.slider')
@include('site.category.index')
<?php
    $prefix     = 'product';
    $name_model = 'sản phẩm';
    $link_image = url("uploads/admin/{$prefix}");
?>
<div class="col-sm-9 padding-right">    
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        <p>Tim thay {{count($list_product_featured)}} san pham </p>
        @foreach($list_product_featured as $val)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{$link_image}}/{{$val->image}}" alt="" height="250px" />
                            <h2>{{number_format($val->price)}} VND</h2>
                            <p><a href="{{$prefix}}/detail/{{$val->id}}" >{{$val->name}}</a></p>
                            <a href="cart/add/{{$val->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div><!--features_items-->
    <div class="row">
        <ul class="pagination">
            <li>{{$list_product_featured->links()}}</li>
        </ul>
    </div>

    <div class="category-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
        @foreach($list_category as $val)    
            <li><a href="{{route('homelist',$val->id)}}" data-toggle="">{{$val->name}}</a></li>
        @endforeach
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="tshirt" >
            @foreach($list_product as $val)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{$link_image}}/{{$val->image}}" alt="" height="250px"/>
                                <h2>{{number_format($val->price)}} VND</h2>
                                <p><a href="{{$prefix}}/detail/{{$val->id}}" >{{$val->name}}</a></p>
                                <a href="cart/add/{{$val->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div><!--/category-tab-->
        <div class="row">
            <ul class="pagination">
                <li>{{$list_product->links()}}</li>
            </ul>
        </div>
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>
        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            @foreach($list_product_recommend as $val)
                <div class="item active">	
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{$link_image}}/{{$val->image}}" alt="" height="250px"/>
                                    <h2>{{number_format($val->price)}} VND</h2>
                                    <p><a href="{{$prefix}}/detail/{{$val->id}}" >{{$val->name}}</a></p>
                                    <a href="cart/add/{{$val->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach   
      
            </div>

        </div>
        <div class="row">
            <ul class="pagination">
                <li>{{$list_product_recommend->links()}}</li>
            </ul>
        </div>
    </div><!--/recommended_items-->
</div>	

@endsection