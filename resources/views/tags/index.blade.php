@extends('layouts.app')

@section('title', 'Tags')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                @auth
                <a href="{{route('tags.create')}}" class="btn btn-primary mb-3">Create new tag +</a>
                @endauth
                <h3>All tags of this blog:</h3>
                <ul>
                    @foreach($tags as $tag)
                        <li>

                            <form action="{{route('tags.destroy', ['tag' => $tag->id])}}" method="post">
                                @csrf
                                @method("DELETE")
                                <a href="{{route('tags.show', ['tag' => $tag->id])}}">{{$tag->title}}</a>
                                @auth
                                <a href="{{route('tags.edit', ['tag' => $tag->id])}}" class="btn btn-warning ms-3 mb-2">Edit</a>
                                <input type="submit" value="Delete" class="btn btn-danger ms-1 mb-2">
                                @endauth
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
