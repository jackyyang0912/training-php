<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use App\Order_detail;
use Session;

class OrderController extends Controller
{

    private $prefix = 'order';

    public function index()
    {
        return view("site.$this->prefix.index");
    }

    public function checkout(Request $request)
    {

        $cart = Session('cart');
        $customer = User::find(69);
        if(Auth::check()){
            $customer->id       = Auth::user()->id;
            $customer->address  = Auth::user()->address;
        
            $order = new Order;
            $order->user_id         = $customer->id;
            $order->address         = $customer->address;
            $order->order_date      = time();
            $order->deliver_date    = strtotime($request->deliver_date);
            $order->status          = 0;
            $order->save();

            foreach($cart->items as $item => $val){
                $order_detail               = new Order_detail;
                $order_detail->order_id     = $order->id;
                $order_detail->product_id   = $item;
                $order_detail->price        = $val['item']['price'];
                $order_detail->quantity     = $val['qty'];
                $order_detail->save();
            }

        }
        Session::forget('cart');

        return redirect()->back()->with('message','Đã đặt hàng thành công');

    }

}