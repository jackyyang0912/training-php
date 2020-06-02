<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product ;
use App\Cart;
use Session;

class CartController extends Controller
{

    private $prefix = 'cart';

    public function index()
    {
        return view("site.$this->prefix.index");
    }

    public function add(Request $request,$id)
    {
        $qty = 1;
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        print("<pre>".print_r($request->all(),true)."</pre>");
 
        if($request->qty){
            $id = $request->id;
            $qty = $request->qty;
            $product = Product::find($request->id);
            $cart->addtocart($product,$id,$qty);
        }else{
            $product = Product::find($id);
            $cart->addtocart($product,$product->id,$qty);
        }
        
        

        if($cart->items > 0){
            Session::put('cart',$cart);
        }

        return redirect('cart');
    }

    public function update(Request $request)
    {
        
        if(Session::has('cart')){
            $oldCart = Session::get('cart');
        }else{
            $oldCart = null;
        }
        
        $cart = new Cart($oldCart);

        $data = $request->all();
        print("<pre>".print_r($data,true)."</pre>");
        $cart->updatecart($data);

        if($cart->items > 0){
            Session::put('cart',$cart);
        }
    
        return view("site.$this->prefix.index");
       

    }

    public function remove($id)
    {
        if(Session::has('cart')){
            $oldCart = Session::get('cart');
        }else{
            $oldCart = null;
        }

        $cart = new Cart($oldCart);
        $cart->removecart($id);

        if($cart->items > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        
        return view("site.$this->prefix.index");
    }
 
}