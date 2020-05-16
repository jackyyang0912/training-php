@extends('site.main')

@section('content')

@include('site.category.index')

<div class="col-sm-9 padding-right">    
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Products</h2>
        <p>Tim thay {{count($list_product)}} san pham </p>
        @foreach($list_product as $val)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="uploads/{{$val->image}}" alt="" />
                            <h2>{{number_format($val->price)}} VND</h2>
                            <p><a href="index.php?controller=product&action=detail&id='.$obj->id.'" >{{$val->name}}</a></p>
                            <a href="index.php?controller=cart&action=add&id='.$obj->id.'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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