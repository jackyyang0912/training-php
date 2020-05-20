@extends('site.main')

@section('content')

@include('site.elements.slider')
@include('site.category.index')

<div class="col-sm-9 padding-right">    
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        <p>Tim thay {{count($list_product_featured)}} san pham </p>
        @foreach($list_product_featured as $val)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="uploads/admin/product/{{$val->image}}" alt="" />
                            <h2>{{number_format($val->price)}} VND</h2>
                            <p><a href="'. BASE_PATH. 'index.php?controller=product&action=detail&id='.$obj->id.'" >{{$val->name}}</a></p>
                            <a href="'. BASE_PATH. 'index.php?controller=cart&action=add&id='.$obj->id.'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
            <li><a href="' 'index.php?controller=home&action=index&id='.$obj->id.'" data-toggle="">{{$val->name}}</a></li>
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
                                <img src="uploads/{{$val->image}}" alt="" />
                                <h2>{{number_format($val->price)}} VND</h2>
                                <p><a href="'. BASE_PATH. 'index.php?controller=product&action=detail&id='.$obj->id.'" >{{$val->name}}</a></p>
                                <a href="'. BASE_PATH. 'index.php?controller=cart&action=add&id='.$obj->id.'"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                                    <img src="uploads/{{$val->image}}" alt="" />
                                    <h2>{{number_format($val->price)}} VND</h2>
                                    <p><a href="index.php?controller=product&action=detail&id='.$obj->id.'" >{{$val->name}}</a></p>
                                    <a href="index.php?controller=cart&action=add&id='.$obj->id.'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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