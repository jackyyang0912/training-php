<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class Cart extends Model
{
    public $items = null;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;   
        }else{
            $this->items = null;
        }
    }

    public function addtocart($item,$id,$qty){

        $item_id = [
            'qty'=> 0,
            'price'=> $item->price,
            'item'=> $item
        ];

        if($this->items){
            if(array_key_exists($id,$this->items)){
                $item_id = $this->items[$id];
            }
        }

        $item_id['qty'] = $item_id['qty'] + $qty;
        $item_id['price'] = $item->price * $item_id['qty'];

        $this->items[$id] = $item_id ;
        $this->totalPrice = 0;
        $this->totalQty = 0;
        foreach($this->items as $key => $val) {
            $this->totalPrice = $this->totalPrice + $this->items[$key]['price'];
            $this->totalQty = $this->totalQty + $this->items[$key]['qty'];
        }
    }

    public function updatecart($data){

        if($data) {
            if($this->items) {
                $qtys = $data['qtys'];
                $ids = $data['ids'];
                foreach($this->items as $key => $val) {
                    if($key == $ids[$key]) {
                        $this->items[$key]['qty'] = $qtys[$key];
                        $this->items[$key]['price'] = $qtys[$key] * $this->items[$key]['item']['price'];
                    }


                }
            }
            $this->totalPrice = 0;
            $this->totalQty = 0;
            foreach($this->items as $key => $val) {
                $this->totalPrice = $this->totalPrice + $this->items[$key]['price'];
                $this->totalQty = $this->totalQty + $this->items[$key]['qty'];
            }

        }

    }


    public function removecart($id){
        $this->totalQty = $this->totalQty - $this->items[$id]['qty'];
        $this->totalPrice = $this->totalPrice - $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
