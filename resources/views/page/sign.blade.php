@extends('layouts.app');
@section('content')
<div class="log">
    <div class="container">
        <div class="log_content">
            <h1 class="title">Регистрация</h1>
            <form action="{{route('user.sign')}}" class="log_from" method="post">
            @csrf
                <div class="form_item">
                    <p class="text">имя </p>
                    <input type="text" name="name" value="{{old('name')}}">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item">
                    <p class="text">фамилия</p>
                    <input type="text" name="surname" value="{{old('surname')}}">
                    @error('surname')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item">
                    <p class="text">отчество</p>
                    <input type="text" name="patronymic" value="{{old('patronymic')}}">
                    @error('patronymic')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item">
                    <p class="text" >логин</p>
                    <input type="text" name="login" value="{{old('login')}}">
                    @error('login')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item">
                    <p class="text" >почта</p>
                    <input type="text" name="email" value="{{old('email')}}">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item">
                    <p class="text" >пароль</p>
                    <input type="password" name="password">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item">
                    <p class="text" >подтвердите пароль</p>
                    <input type="password" name="password_repeat" >
                </div>
                <div class="form_item form_btn">
                    <input type="submit" value="зарегистрироваться" class="btn" >
                    <p class="text">Уже есть аккаунт?<a href="{{route('LogPage')}}" class="link">Войти</a></p>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection