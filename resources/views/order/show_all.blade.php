@extends('layout')

@section('content')
    <h2>Товары</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Дата</th>
            <th>Итого</th>
        </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->created_at->diffForHumans()}}</td>
                    <td>
                        @foreach($order->products as $product)
                            <a href="/products/{{$product->alias}}">{{$product->title}}</a>
                            {{$product->price}}
                            X
                            {{$product->pivot->amount}} =
                            {{$product->pivot->amount * $product->price}}
                            <br>
                        @endforeach
                    </td>
                    <td>{{$order->total_price}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection