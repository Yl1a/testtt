@extends('layouts.app');
@section('content')
<div class="log">
    <div class="container">
        <div class="log_content">
            <h1 class="title">Войти</h1>
            <form action="{{route('user.log')}}" class="log_from" method="post">
                @csrf
                <div class="form_item">
                    <p class="text">почта</p>
                    <input type="text" name="email">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item">
                    <p class="text">пароль</p>
                    <input type="password" name="password">
                    @error('password')
                    {{$message}}
                    @enderror
                    @error('invalid_password')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item form_btn">
                    <input type="submit" value="Войти" class="btn">
                    <p class="text">Еще нет аккаунта?<a href="{{route('SignPage')}}" class="link">Зарегистрироваться</a></p>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection