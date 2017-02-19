@extends('layout')

@section('content')
    <h2>Ваш заказ:</h2>
    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>Название товара</th>
                <th>Цена</th>
                <th>Количество</th>
    			<th>Сумма</th>
    		</tr>
    	</thead>
    	<tbody>
            @php
                $total_sum=0;
            @endphp
            @foreach($products as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a class="btn btn-danger" href="/cart_minus/{{$product->alias}}">-</a>
                        {{$cart[$product->id]}}
                        <a class="btn btn-success" href="/cart_add/{{$product->alias}}">+</a>
                    </td>
                    <td>{{$product->price * $cart[$product->id]}}</td>
                </tr>
                @php
                $total_sum+= $product->price * $cart[$product->id];
                @endphp
            @endforeach
            <tr>
                <td colspan="3">К оплате:</td>
                <td>{{$total_sum}}</td>
            </tr>
    	</tbody>
    </table>
    <div class="col-sm-push-2 col-sm-8">
        <h2>Укажите данные</h2>
        <form action="/order" method="POST" role="form">
            {{csrf_field()}}
            <input type="hidden" name="total_price" value="{{$total_sum}}">
        	<div class="form-group">
        		<label for="customer_name">Ваше имя</label>
        		<input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Ваше имя">
        	</div>
            <div class="form-group">
                <label for="email">e-mail</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="e-mail">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="777-77-77">
            </div>
            <div class="form-group">
                <label for="feedback">Комментарий</label>
                <textarea name="feedback" id="feedback" class="form-control"></textarea>
            </div>
        	<button type="submit" class="btn btn-primary">Оформить заказ</button>
        </form>
    </div>
@endsection('content')