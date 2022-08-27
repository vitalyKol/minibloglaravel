@extends('layouts.app')

@section('title')
    {{$article->title}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{$article->title}}</h2>
                <h4>Category: {{$category}}</h4>
                <img src="{{asset('/storage/'.$article->image)}}" class="w-50">
                <p>
                    {{$article->text}}
                </p>
                <h5>Tags:
                    @foreach($tags as $tag)
                        <a href="#">{{$tag->title}}</a>
                    @endforeach
                </h5>
            </div>
        </div>
    </div>

@endsection

