<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Trang Admin
Route::group(['prefix' => 'admin'],function(){
    Route::group(['prefix' => 'product'],function(){
        Route::get('list'                 ,'admin\ProductController@list');

        Route::get('create'               ,'admin\ProductController@getcreate');
        Route::post('create'              ,'admin\ProductController@postcreate');

        Route::get('edit/{id}'            ,'admin\ProductController@getedit');
        Route::post('edit/{id}'           ,'admin\ProductController@postedit');

        Route::get('status/{curent}/{id}' ,'admin\ProductController@status')->where('id', '[0-9]+');

        Route::get('delete/{id}'          ,'admin\ProductController@delete')->where('id', '[0-9]+');
        Route::post('deletes'             ,'admin\ProductController@deletes');
    });
    Route::group(['prefix' => 'category'],function(){
        Route::get('list'                 ,'admin\CategoryController@list');

        Route::get('create'               ,'admin\CategoryController@getcreate');
        Route::post('create'              ,'admin\CategoryController@postcreate');

        Route::get('edit/{id}'            ,'admin\CategoryController@getedit');
        Route::post('edit/{id}'           ,'admin\CategoryController@postedit');

        Route::get('status/{curent}/{id}' ,'admin\CategoryController@status')->where('id', '[0-9]+');

        Route::get('delete/{id}'          ,'admin\CategoryController@delete')->where('id', '[0-9]+');
        Route::post('deletes'             ,'admin\CategoryController@deletes');
    });
});


//Trang site
Route::get('home',[
    'as'=>'home',
    'uses'=>'site\HomeController@index'
]);

Route::get('product',[
    'as'=>'product',
    'uses'=>'site\ProductController@index'
]);

Route::get('product/detail',[
    'as'=>'productdetail',
    'uses'=>'site\ProductController@detail'
]);

Route::get('checkout',[
    'as'=>'checkout',
    'uses'=>'site\ProductController@checkout'
]);

Route::get('cart',[
    'as'=>'cart',
    'uses'=>'site\ProductController@cart'
]);

Route::get('login',[
    'as'=>'login',
    'uses'=>'site\ProductController@login'
]);