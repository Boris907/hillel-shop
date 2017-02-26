@extends('layout')

@section('content')
    @foreach($products as $product)
        <div class="col-md-4">
            <h2>{{$product->title}}</h2>
            <p>Цена: ${{$product->price}}</p>
            <p>
                <a href="/products/{{$product->alias}}" class="btn btn-primary">
                    Подробное описание
                </a>
                <a href="javascript:void(0)" data-title="{{$product->title}}" data-token="{{csrf_token()}}" data-id="{{$product->id}}" class="btn btn-success cart_add">
                    Добавить в корзину
                </a>
            </p>
        </div>
    @endforeach
@endsection