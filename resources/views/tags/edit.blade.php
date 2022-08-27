@extends('layouts.app')

@section('title')
    Edit tag — {{$tag->title}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('tags.update', ['tag' => $id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">Title of the tag:</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{$tag->title}}">
                    </div>
                    <input class='btn btn-primary' type="submit" value="Update the tag">
                </form>

            </div>
        </div>
    </div>

@endsection
