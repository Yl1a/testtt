@extends('layouts.app')
@section('content')

<div class="banner">
    <div class="container">
        <div class="banner_content" >
                    <div class="slogan_info">
                        <h2 class="title">
                            О нас
                        </h2>
                        <p class="text">
                            SmartShop- Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, voluptatem ducimus maxime deserunt hic perferendis animi quasi nihil 
                        </p>
                    </div>
                    <div class="banner_img">
                    </div>
        </div>
    </div>
</div>

<main class="mainPage">
    <div class="slider">
        <div class="container slider_container">
            <h2 class="title">
                Горячие новинки
            </h2>
            
            <div class="slider_full">
            <div class="slider_content">
                <div class="slider_items" id="slides">
                    @foreach($shops as $shop)
                    <div class="slide" style="background-image: linear-gradient(#04041005, #040410), url({{$shop->getImage()}});
                    background-size: cover;"><p class="text">{{$shop['title']}}</p></div>
                    @endforeach
                </div>
            </div>
            <div class="slider_btn">
                <a class="s_button" id="next">></a>
            </div>
            </div>
        </div>
    </div>

        <div class="about">
            <div class="container">
                <div class="about_content">
                    <div class="about_info">
                        <h2 class="title">
                            О нас
                        </h2>
                        <p class="text">
                            Название- Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, voluptatem ducimus maxime deserunt hic perferendis animi quasi nihil eaque omnis voluptate aspernatur inventore nisi et recusandae provident. Quas, nam asperiores?
                        </p>
                    </div>
                    <div class="about_img">
                    </div>
                </div>
            </div>
        </div>
    <div class="map">
        <div class="container map_container">
            <div class="info">
                <h2>Контакты</h2>
                    <div class="contact">
                    <p class="text">
                        Почта: sweet@mail.ru
                    </p>
                    </div>
                    <div class="contact">
                    <p class="text">
                        Адрес: г.Казань, ул. NNN, д.2/1
                    </p>
                    </div>
                    <div class="contact">
                    <p class="text">
                        Телефон: +7 239 203 90 23
                    </p>
                    </div>
            </div>
        </div>
    </div>
</main>
@endsection