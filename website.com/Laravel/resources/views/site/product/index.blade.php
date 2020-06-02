@extends('site.main')

@section('content')

@include('site.category.index')

<?php
    $prefix     = 'product';
    $name_model = 'sản phẩm';
    $link_image = url("uploads/admin/{$prefix}");
?>
<div class="col-sm-9 padding-right">    
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">{{$cate_name->name}} Products</h2>
        <p>Tim thay {{count($list_product)}} san pham </p>
        @foreach($list_product as $val)
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

        @endforeach
    </div><!--features_items-->
    
    <div class="row">
        <ul class="pagination">
            <li>{{$list_product->links()}}</li>
        </ul>
    </div>
</div>	

@endsection