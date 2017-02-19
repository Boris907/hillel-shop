@extends('layout')

@section('content')
        <div class="col-md-12">
            <h2>{{$product->title}}</h2>
            <p>Описание: {{$product->description}}</p>
            <p>Цена: ${{$product->price}}</p>
            <p>
                <a href="/cart_add/{{$product->alias}}" class="btn btn-success">
                    Добавить в корзину
                </a>
            </p>
        </div>
@endsection