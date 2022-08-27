@extends('layouts.app')

@section('title')
    Create a new article
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
                <form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">Title of a new article:</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="category" class="form-label">Category of a new article:</label>
                        <select name="category" id="category" class="form-select">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="text" class="form-label">Enter text:</label>
                        <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>

                    <div class="form-group mb-2">
                        <label for="tags" class="form-label">Choose tags:</label>
                        <select name="tags" id="tags" class="form-select" multiple="multiple">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="file" class="form-label">Choose img:</label><br>
                        <input type="file" name="image" id="file" class="form-control-file" >
                    </div>

                    <input class='btn btn-primary' type="submit" value="Create new article">
                </form>

            </div>
        </div>
    </div>

@endsection
