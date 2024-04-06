@extends('layouts.app')

@section('content')

<div class="catalog">
    <div class="container">
        <div class="catalog_content">
            @auth
                    <h1 class="title">
                        Заказы
                    </h1>
                    
                    <div class="status_content">
                        @if(isset($statuss))
                        <div class="status_item">
                            <a href="{{route('cartPageAdmin')}}" class="btn">все</a>
                        </div>
                        @foreach($statuss as $status)
                            <div class="status_item">
                                <a href="?status={{$status['status']}}" class="btn">{{$status['status']}}</a>
                            </div>
                        @endforeach
                        @endif

                    </div>
                        @if(auth()->user()->role==1)
                            
                            @if(isset($activeCartsUsers)&& $activeCartsUsers->count()>0)
                                    <div class="order">
                                        @foreach($activeCartsUsers as $activeCartsUser)
                                                <div class="cart_item">
                                                    <div class="cart_info">
                                                        <p class="text">{{$activeCartsUser['updated_at']}} </p>
                                                        <p class="text">{{$activeCartsUser->orders->sum('count')}}</p>
                                                        <p class="text">{{$activeCartsUser->user['name']}} {{$activeCartsUser->user['surname']}} {{$activeCartsUser->user['patronymic']}}</p>
                                                    </div>
                                                    <p class="text">{{$activeCartsUser['status']}}</p>
                                                    @if(isset($activeCartsUser['reason']))
                                                        <p class="text">{{$activeCartsUser['reason']}}</p>
                                                    @endif
                                                </div>
                                        @endforeach
                                    </div>
                            @else
                                    <p class="text">здесь пока нет ничего</p>
                            @endif
                        @else
                        @if(isset($activeCarts)&& $activeCarts->count()>0)
                                <div class="order">
                                    @foreach($activeCarts as $activeCart)
                                            <div class="cart_item">
                                                <div class="cart_info">
                                                    <p class="text">{{$activeCart['updated_at']}} </p>
                                                    <p class="text">{{$activeCart->orders->sum('count')}}</p>
                                                    <p class="text">{{$activeCart->user['name']}} {{$activeCart->user['surname']}} {{$activeCart->user['patronymic']}}</p>
                                                </div>
                                                @if($activeCart['status']=='Оформлено')
                                                <div class="admin_cart_btn">
                                                    <form action="{{route('carts.confirm', $activeCart->id)}}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn">Подтвердить</button>
                                                    </form>
                                                    <form action="{{route('carts.cancel', $activeCart->id)}}" method="post" class="cancel_form">
                                                        @csrf
                                                        <input type="text" name="reason" placeholder="reason"> 
                                                        @error('reason')
                                                        {{$message}}
                                                        @enderror
                                                        <button type="submit" class="btn">отменить</button>
                                                    </form>
                                                </div>
                                                @else
                                                <p class="text">{{$activeCart['status']}}</p>
                                                @endif
                                            </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text">здесь пока нет ничего</p>
                            @endif
                        @endif

            @endauth
        </div>
    </div>
</div>

@endsection