<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Product extends Model
{
    protected $table = 'Product';
    public $timestamps = false;
    public function category_product(){
        return $this->belongTo('App/Category_product','category_id','id');
    }
}
