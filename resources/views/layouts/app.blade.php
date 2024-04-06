<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
    <script src="{{asset('public/assets/js/main.js')}}" defer></script>
    <script src="{{asset('public/assets/js/sort.js')}}" defer></script>
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        @include('component.header')
        @include('component.message')
        <div class="main">
            @yield('content')
        </div>
        @include('component.footer')
    </div>
</body>
</html>