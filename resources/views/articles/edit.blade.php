@extends('layouts.app')

@section('title')
    Edit the article — {{$article->title}}
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
                <form action="{{route('articles.update', ['article' => $article->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">Title of a new article:</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{$article->title}}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="category" class="form-label">Category of a new article:</label>
                        <select name="category" id="category" class="form-select">
                            @foreach($categories as $category)
                                @if($article->category_id == $category->id)
                                    <option value="{{$category->id}}" selected>{{$category->title}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="text" class="form-label">Enter text:</label>
                        <textarea name="text" id="text" cols="30" rows="10" class="form-control">{{$article->text}}</textarea>

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
                            <input type="file" name="image" id="file" class="form-control-file" value="{{$article->image}}">
                        </div>

                        <input class='btn btn-primary' type="submit" value="Create new article">
                </form>

            </div>
        </div>
    </div>

@endsection
