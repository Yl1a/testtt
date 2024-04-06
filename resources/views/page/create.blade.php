@extends('layouts.app');

@section('content')
<div class="log">
    <div class="container">
        <div class="log_content">
            <h1 class="title">Добавить</h1>
            <form action="{{route('create')}}" class="log_from" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form_item">
                    <p class="text">title</p>
                    <input type="text" name="title">
                    @error('title')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item">
                    <p class="text">descr</p>
                    <input type="text" name="descr">
                    @error('descr')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item">
                    <p class="text">cost</p>
                    <input type="number" name="cost">
                    @error('cost')
                    {{$message}}
                    @enderror
                </div>
                <div class="form_item">
                    <p class="text">category</p>
                    <select name="category" id="">
                        <option value="">выбрать категорию</option>
                        @foreach($categories as $category)
                        <option @selected($category->id==old('category')) value="{{$category->id}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form_item">
                    <p class="text">изображение</p>
                    <input type="file" class="log_input" placeholder="category" name="img">
                    @error('img')
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