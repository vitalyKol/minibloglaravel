@extends('layouts.app')

@section('title', 'Categories')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('categories.create')}}" class="btn btn-primary mb-3">Create new category +</a>
                <h3>All categories of this blog:</h3>
                <ul>
                    @foreach($categories as $category)
                        <li>
                            <a href="{{route('categories.edit', ['category' => $category->id])}}">{{$category->title}}</a>
                            <a href="{{route('categories.edit', ['category' => $category->id])}}" class="btn btn-warning ms-3 mb-2">Edit</a>
                            <a href="#" class="btn btn-danger ms-1 mb-2">Delete</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
