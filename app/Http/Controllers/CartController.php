<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    //get product alias and add to cart
    public function add()
    {
        //request()->cookie('cart')
        $product = Product::find(request('id'));
        $cart = request()->cookie('cart') ? json_decode(request()->cookie('cart'), true) : [];
        if (isset($cart[$product->id])) $cart[$product->id]++;
        else $cart [$product->id] = 1;

        $cookie = Cookie::forever('cart', json_encode($cart));
        $response = new Response('');
        //$response->view();
        $response->headers->setCookie($cookie);
        return $response;
        //return back()->withCookie('cart', json_encode($cart), 45000);
    }

    /*    public function add(){
            $product = Product::find(request('id'));
            return request('id');
        }*/

    public function minus(Product $product)
    {
        //request()->cookie('cart')
        $cart = request()->cookie('cart') ? json_decode(request()->cookie('cart'), true) : [];
        if (isset($cart[$product->id]) && $cart[$product->id] > 1) $cart[$product->id]--;
        return back()->withCookie('cart', json_encode($cart), 45000);
    }
}
