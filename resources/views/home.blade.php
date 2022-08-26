@extends('layouts.app')

@section('title', 'Main Page')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('articles.create')}}" class="btn btn-primary mb-3">Create new article +</a>
                <h3>All articles of this blog:</h3>
                <ul>
                @foreach($articles as $article)
                        <li>
                            <a href="{{route('articles.show', ['article' => $article->id])}}">{{$article->title}}</a>
                            <a href="{{route('articles.edit', ['article' => $article->id])}}" class="btn btn-warning ms-3 mb-2">Edit</a>
                            <a href="#" class="btn btn-danger ms-1 mb-2">Delete</a>
                        </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
