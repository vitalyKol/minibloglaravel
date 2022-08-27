@extends('layouts.app')

@section('title')
    Edit tag — {{$category->title}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('categories.update', ['category' => $id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">Title of the tag:</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{$category->title}}">
                    </div>
                    <input class='btn btn-primary' type="submit" value="Update the category">
                </form>

            </div>
        </div>
    </div>

@endsection
