<header>
    <div class="container">
        <div class="header_content">
            <a href="{{route('main.page')}}" class="logo_link"><img src="{{asset('public/assets/img/logo3.png')}}" alt="" class="logo"></a>
            <input type="checkbox" id="burger"><!-- 
            <button class="btn back">назад</button> -->
            <label for="burger"></label>
            <nav>
                <div class="menu">
                    <a href="{{route('main.page')}}" class="link">Главная</a>
                    <a href="{{route('catalog.page')}}" class="link">Каталог</a>
                    @auth
                    @if(auth()->user()->role==2)
                    <a href="{{route('cartPageAdmin')}}" class="link">Заказы</a>
                    @endif

                    @if(auth()->user()->role==1)
                    <a href="{{route('cartPage')}}" class="link">Корзина</a>
                    <a href="{{route('cartPageAdmin')}}" class="link">Заказы</a>
                    @endif
                    @endauth
                    <div class="mobile_btn">
                        @auth
                        <div class="header_btn_mobile">
                            <div class="header_btn_mobile">
                                <form action="{{route('user.logout')}}" method="post">
                                    @csrf
                                    <input type="submit" value="Выйти" class="mob_btn">
                                </form>
                            </div>
                        </div>
                        @endauth
                        @guest
                        <div class="header_btn_mobile">
                            <div class="header_btn_mobile">
                                <a href="{{route('LogPage')}}" class="mob_btn">Войти</a>
                            </div>
                        </div>

                        @endguest
                    </div>
                </div>


            </nav>
            @auth
            <div class="header_btn">
                <div class="header_btn">
                    <form action="{{route('user.logout')}}" method="post">
                        @csrf
                        <input type="submit" value="Выйти" class="btn">
                    </form>
                </div>
            </div>
            @endauth
            @guest
            <div class="header_btn">
                <div class="header_btn">
                    <a href="{{route('LogPage')}}" class="btn">Войти</a>
                </div>
            </div>

            @endguest

        </div>

    </div>

</header>