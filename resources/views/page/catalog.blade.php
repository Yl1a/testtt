@extends('layouts.app')

@section('content')

<div class="catalog">
    <div class="container">
        <div class="catalog_content">
            <h1 class="title">
                Каталог
            </h1>
            <br>
            <div class="sort_filter">            
                <div class="category_content">
                    <div class="category_item"><a href="{{route('catalog.page')}}" class="btn">все</a></div>
                    @foreach($categories as $category)
                        <div class="category_item">
                            <a href="?category={{$category->id}}" class="btn">{{$category['name']}} 
                            @auth
                            @if(auth()->user()->role==2)
                            <a href="{{route('deleteCategory', $category->id)}}"  class="btn close_btn">×</a>
                            @endif
                            @endauth
                            </a>
                            <!-- <p class="btn">{{$category['name']}}</p> -->
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="admin_sort">
            <div class="sort">
                <select name="category" id="select" class="sort_select">  
                    <option value="default">сортировка по цене</option> 
                    <option value="LowToHight">по возрастанию</option> 
                    <option value="HightToLow">по убыванию</option>                          
                </select> 
            </div>
            @auth
                @if(auth()->user()->role==2)
                <div class="admin">
                    <p class="text">Админ панель магазина</p>
                
                    <div class="admin_content">
                        <div class="admin_item">
                        <a href="{{route('categoryPage')}}" class="link">Создать категорию</a>
                        </div>
                    <div class="admin_item">
                        <a href="{{route('createPage')}}" class="link">Создать товар</a>
                    </div>
                </div>
                @endif
            </div>
            @endauth
        </div>
        <div class="cards">
                @foreach($shops as $shop)
                <div class="card" data-price="{{$shop['cost']}}">
                    <div class="card_img" style="background-image: url({{$shop->getImage()}});
                    background-size: cover;"></div>
                    <div class="card_info">
                    <p class="category">category:{{$shop->categoryGet['name']}}</p>
                        <h3 class="title">{{$shop['title']}}</h3>
                        <p class="cost">{{$shop['cost']}} ₽</p>
                    </div>
                    <div class="card_btn">
                        <a href="{{route('cardPage', $shop->id)}}" class="link">подробнее</a>
                    </div>
                </div>
                @endforeach
        </div>
        </div>
    </div>
</div>

@endsection