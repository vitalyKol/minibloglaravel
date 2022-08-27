@extends('layouts.app')

@section('title')
    All articles which has tag: {{$tag->title}}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>All articles which has tag: {{$tag->title}}</h3>
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
