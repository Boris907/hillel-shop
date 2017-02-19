<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
   //get product alias and add to cart
    public function add(Product $product){
        //request()->cookie('cart')
        $cart = request()->cookie('cart') ? json_decode(request()->cookie('cart'),true):[];
        if(isset($cart[$product->id])) $cart[$product->id]++;
    else $cart [$product->id] = 1;
        return back()->withCookie('cart',json_encode($cart),45000);
    }

    public function minus(Product $product){
        //request()->cookie('cart')
        $cart = request()->cookie('cart') ? json_decode(request()->cookie('cart'),true):[];
        if(isset($cart[$product->id]) && $cart[$product->id]>1 ) $cart[$product->id]--;
        return back()->withCookie('cart',json_encode($cart),45000);
    }
}
