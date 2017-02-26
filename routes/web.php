<?php

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

Route::get('/','ProductsController@index');
Route::get('/products/{product}','ProductsController@show');

//Route::get('/cart_add/{product}','CartController@add');
Route::post('/cart_add','CartController@add');
Route::get('/cart_minus/{product}','CartController@minus');

Route::get('/order/show','OrdersController@index');
Route::get('/order','OrdersController@create');
Route::post('/order','OrdersController@store');

Route::get('/order/success',function (){
    return view('order.success');
});
