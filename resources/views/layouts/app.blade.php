<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <title> @yield('title')</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col text-center pt-5">
            <h1>BLOG</h1>
            <h5><a href="{{ route('main') }}">Main</a>
                <a href="{{route('categories.index')}}">Categories</a>
                <a href="{{route('tags.index')}}">Tags</a>
            <a href="{{ route('about') }}">About</a></h5>
        </div>
    </div>
</div>


<hr>
@yield('content')
<script src="{{asset('/js/bootstrap.min.js')}}}}"></script>
</body>
</html>
