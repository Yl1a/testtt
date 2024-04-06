@extends('layouts.app')

@section('content')

<div class="catalog">
    <div class="container">
        <div class="catalog_content">
            @auth
            <h1 class="title">
                Корзина
            </h1>
            <div class="cart_full_content">
            
            @if(isset($shops) && $shops->count()>0)
            <div class="cart_content">
                @foreach($shops as $shop)
                @php
                    $order = \App\Models\Order::query()->where('cart_id', $activeCart->id)->where('shops_id',$shop->id)->first();
                    $count = $order['count'];
                @endphp
                <div class="cart_item">
                    <div class="cart_img" style="background-image:url({{$shop->getImage()}});
    background-size: cover;">
                        
                    </div>
                    <p class="text">{{$shop['title']}}</p>
                    <div class="count">
                        <form action="{{route('order.plus', $order->id)}}" method="post">
                            @csrf
                            <button class="icon_btn" type="submit" >+</button>
                        </form>
                        <p class="text">{{$count}}</p>
                        <form action="{{route('order.minus', $order->id)}}" method="post">
                            @csrf
                            <button class="icon_btn" type="submit" >-</button>
                        </form>
                    </div>
                    <p class="text">{{$shop['cost']}} ₽</p>

                    <div class="admin_cart_btn">
                        <form action="{{route('destroyShop', [$activeCart->id, $shop->id])}}" method="post">
                            @csrf
                            <button type="submit" class="btn">очистить</button>
                        </form>
                    </div>
                </div>
                @endforeach

            </div>
            <form action="{{route('carts.checkout', $activeCart->id)}}" method="post"class="cart_form">
                            @csrf
                            <h2 class="title">
                                Оформление заказа
                            </h2>
                            <div class="cart_input">
                                <p class="text">Подтвердите пароль</p>
                                <input type="password" name='password'>
                                @error('password')
                                    {{$message}}
                                @enderror
                            </div>
                            <button type="submit" class="btn">оформить заказ</button>
                        </form>
            
            @else
                <p class="text">корзина пуста</p>
                @endif
            </div>
            @endauth
        </div>
    </div>
</div>

@endsection