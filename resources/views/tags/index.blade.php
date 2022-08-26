@extends('layouts.app')

@section('title', 'Tags')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('tags.create')}}" class="btn btn-primary mb-3">Create new tag +</a>
                <h3>All tags of this blog:</h3>
                <ul>
                    @foreach($tags as $tag)
                        <li>
                            <a href="{{route('tags.edit', ['tag' => $tag->id])}}">{{$tag->title}}</a>
                            <a href="{{route('tags.edit', ['tag' => $tag->id])}}" class="btn btn-warning ms-3 mb-2">Edit</a>
                            <a href="#" class="btn btn-danger ms-1 mb-2">Delete</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
