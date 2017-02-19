<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::all();

        return view('order.show_all',compact('orders'));
    }
    //
    public function create(){
        $cart = request()->cookie('cart') ? json_decode(request()->cookie('cart'),true):[];
        if(empty($cart)) return redirect('/');

        $products =[];
        foreach ($cart as $productId => $productAmount){
            $products[] = Product::find($productId);
        }
        return view('order.index', compact('products','cart'));
    }

    public function store(){
        $cart = request()->cookie('cart') ? json_decode(request()->cookie('cart'),true):[];
        $order = Order::create(request([
            'customer_name',
            'email',
            'phone',
            'total_price',
            'feedback']));

        foreach ($cart as $productId => $productAmount){
            $order->products()->attach($productId,['amount'=> $productAmount]);
        }
        $cookie = \Cookie::forget('cart');
        return redirect('/order/success')->withCookie($cookie);
    }
}
