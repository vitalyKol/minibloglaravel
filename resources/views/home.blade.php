@extends('layouts.app')

@section('title', 'Main Page')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                @auth
                <a href="{{route('articles.create')}}" class="btn btn-primary mb-3">Create new article +</a>
                @endauth
                <h3 class="text-center">All articles of this blog:</h3>
                    <div class="container">
                        <div class="row">
                            @foreach($articles as $article)
                                <div class="col-4">
                                <div class="card me-2 mb-2">
                                    @if($article->image)
                                       <img src="{{asset('/storage/'.$article->image)}}" alt="card img" class="card-img-top">
                                    @endif
                                    <h3 class="card-title text-center"><a href="{{route('articles.show', ['article' => $article->id])}}">{{$article->title}}</a></h3>
                                    @auth
                                        <a href="{{route('articles.edit', ['article' => $article->id])}}" class="btn btn-warning w-100 mb-2">Edit</a>
                                        <form action="{{route('articles.destroy', ['article' => $article->id])}}" method="post">
                                            @csrf
                                            @method("DELETE")

                                            <input type="submit" value="Delete" class="btn btn-danger w-100 mb-2">
                                        </form>
                                    @endauth
                                        <h6 class="text-center">{{$article->created_at}}</h6>
                                </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection
