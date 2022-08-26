@extends('layouts.app')

@section('title')
    Create a new tag
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('tags.store')}}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">Title of a new tag:</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <input class='btn btn-primary' type="submit" value="Create new tag">
                </form>

            </div>
        </div>
    </div>

@endsection
