<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product ;
use App\Category;


class ProductController extends Controller
{

    private $prefix = 'product';

    public function index()
    {
        $list_category  = Category::where('status',1)->get();
        $list_product   = Product::where('status',1)->paginate(6);
        
        return view("site.$this->prefix.index", compact('list_category','list_product'));
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
        $cate_name = Category::where([['status',1],['id',$id]])->first();
        return view("site.$this->prefix.index", compact('list_category','list_product','cate_name'));
    }

    public function detail(Request $request)
    {
        $list_category  = Category::where('status',1)->get();
        $item = Product::where('id',$request->id)->first();

        if($item){
            $related_items = Product::where([['id','<>',$request->id],['category_id','=',$item->category_id]])->get();
        }
        
        return view("site.$this->prefix.detail", compact('item','list_category','related_items'));
    }

}