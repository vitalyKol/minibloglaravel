@extends('layouts.app')

@section('title')
    {{$article->title}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{$article->title}}</h2>
                <h4>Category: <a href="{{route('categories.show', ['category' => $category->id])}}">{{$category->title}}</a></h4>
                @if($article->image)
                    <div class="text-center">
                        <img src="{{asset('/storage/'.$article->image)}}" class="w-50">
                    </div>
                @endif
                <p>
                    {{$article->text}}
                </p>
                <h5>Tags:
                    @foreach($tags as $tag)
                        <a href="{{route('tags.show', ['tag' => $tag->id])}}">{{$tag->title}}</a>
                    @endforeach
                </h5>
            </div>
        </div>
    </div>

@endsection

