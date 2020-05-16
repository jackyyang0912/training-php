<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;

use App\Product ;
use App\Category;


class ProductController extends Controller
{

    private $prefix = 'product';

    public function index()
    {
        $list_category  = Category::where('status',1)->get();
        $list_product   = Product::where('status',1)->paginate(4);
        
        return view("site.$this->prefix.index", compact('list_category','list_product'));
    }


    public function detail($slug) {
        $item = Item_model::where('slug', '=', $slug)->first();
        $category = $item->category;
        $breadcumb = array();
        $breadcumb[] = array(
            'link' => url("san-pham/{$category->slug}-{$category->id}.html"),
            'name' => $category->name
        );
        $breadcumb[] = array(
                            'link' => '',
                            'name' =>  $item->name
                        );
        $this->data['breadcumb'] = $breadcumb;
        $this->data['item'] = $item;
        $this->data['title'] = $item->name;
        return view('site.product.detail', $this->data);
    }
}