<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    
    private $prefix = 'order';
    private $name   = 'đơn hàng';

    public function list(Request $request){

        //Tim kiem theo id,name,status

        $list_order = DB::table('order')                        
                        ->leftjoin('user', 'order.user_id', '=', 'user.id')
                        ->leftjoin('order_detail', 'order.id', '=', 'order_detail.order_id')
                        ->select('order.*', 'user.name', 'user.email', 'user.phone',DB::raw('count(order.id) as so_luong'))
                        ->groupBy('order.id');
                        
        $id = $request->input('id');
        $name = $request->input('name');
        $status = $request->input('status');
        $params = [];

        if($id){
            $params[] = ['order.id','=',$id];
        }
        if($name){
            $params[] = ['user.name','LIKE','%'.$name.'%'];
        }
        if($status){
            $params[] = ['order.status','=',$status];
        }

        $list_order = $list_order->where($params)->paginate(10);

        return view("admin.$this->prefix.list", compact('list_order','request'));
    }

    public function detail($id){
        
        
        $sql = "SELECT `order_detail`.*, `product`.`name` FROM `order_detail`, `product` 
        WHERE `order_detail`.`product_id` = `product`.`id`  AND `order_id` = $id";

        $list_detail = DB::table('order_detail')                        
                    ->leftjoin('product', 'order_detail.product_id', '=', 'product.id')
                    ->select('order_detail.*', 'product.name');


        $params = [];
        if($id){
            $params[] = ['order_detail.order_id','=',$id];
        }

        $list_detail = $list_detail->where($params)->get();

        return view("admin.$this->prefix.detail", compact('list_detail'));
    }


    public function status($curent_status, $id)
    {   
        $message = '';   

        $item = Order::find($id);
        
        if($item) {
            $item->status = $curent_status == 1 ? 0 : 1;
            $item->save();
            $message = "Cập nhật status thành công";
        }else {
            $message = "Status không tồn tại";
        }
        return redirect("admin/{$this->prefix}/list")->with('message', $message);
    }
}