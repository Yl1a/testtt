@extends('layouts.app')

@section('content')

<div class="cardPage">
    <div class="container">
        <div class="cardPage_content">
            <div class="card_img_page" style="background-image:linear-gradient(#04041005, #040410), url({{$shop->getImage()}});
                    background-size: cover;">
            </div>

            <div class="cardPage_info">
                <h1 class="title">Названи: {{$shop['title']}}</h1>
                <div class="info_content">
                <p class="text"><span class="card_info_color">category: </span>{{$shop->categoryGet['name']}}</p>
                <p class="text"><span class="card_info_color">Описание: </span>{{$shop['descr']}}</p>
                <p class="cost"><span class="card_info_color">Цена:</span> {{$shop['cost']}} ₽</p>
                </div>
                @auth
                @if(auth()->user()->role==1)
                <div class="admin_item_btn">
                    <form action="{{route('cartPut', $shop->id)}}" method="post">
                        @csrf
                        <button class="cart_btn" type="submit">в корзину</button>
                        @if(isset($errorInfo))  
                        <p class="text">{{$errorInfo}}</p>                  
                        @endif                      
                    </form>
                </div>
                @endif
                @if(auth()->user()->role==2)
                <div class="admin_content">
                <div class="admin_item">
                <a href="{{route('editPage', $shop->id)}}" class="link">Редактировать</a>
                </div>
                <div class="admin_item">
                <a href="{{route('delete', $shop->id)}}" class="link">удалить</a>
                </div>
                </div>
                @endif
                @endauth
                
            </div>
        </div>
    </div>
</div>

@endsection