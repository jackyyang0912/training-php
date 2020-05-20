<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Category_product';
    public $timestamps = false;
    public function product(){
        return $this->hasMany('App/Product','category_id','id');
    }
}
