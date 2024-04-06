@extends('layouts.app');

@section('content')
<div class="log">
    <div class="container">
        <div class="log_content">
            <h1 class="title">Добавить</h1>
            <form action="{{route('categoryCreate')}}" class="log_from" method="post">
                @csrf
                <div class="form_item">
                    <p class="text">name</p>
                    <input type="text" name="name">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item form_btn">
                    <input type="submit" value="создать" class="btn">
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection