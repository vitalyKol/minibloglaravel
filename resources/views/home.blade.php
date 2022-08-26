@extends('layouts.app')

@section('title', 'Main Page')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('articles.create')}}" class="btn btn-primary">Create new article +</a>
                <h3>All articles of this blog:</h3>
                <ul>
                @foreach($articles as $article)
                        <li><a href="{{route('articles.show', ['article' => $article->id])}}">{{$article->title}}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
