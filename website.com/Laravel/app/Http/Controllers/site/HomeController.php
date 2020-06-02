<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;

use App\Product ;
use App\Category;

class HomeController extends Controller
{

    private $prefix = 'home';

    public function index()
    {
        $list_category  = Category::where('status',1)->get();
        $list_product   = Product::where('status',1)->paginate(4);
        $list_product_featured = Product::where([['status',1],['is_feature',1]])->paginate(6);
        $list_product_recommend = Product::where([['status',1],['is_recommend',1]])->paginate(4);

        return view("site.$this->prefix.index", compact('list_category','list_product','list_product_featured','list_product_recommend'));
    }

    public function list($id)
    {
        $list_category  = Category::where('status',1)->get();
        $list_product = Product::select('product.*');

        $params[] = ['status','=',1];
        if($id){
            $params[] = ['category_id','=',$id];
        }

        $list_product = $list_product->where($params)->paginate(9);
        $list_product_featured = Product::where([['status',1],['is_feature',1]])->paginate(6);
        $list_product_recommend = Product::where([['status',1],['is_recommend',1]])->paginate(4);
        $cate_name = Category::where([['status',1],['id',$id]])->first();
     
        return view("site.$this->prefix.index", compact('list_category','list_product','list_product_featured','list_product_recommend'));
    }
}
