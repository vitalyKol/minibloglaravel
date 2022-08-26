@extends('layouts.app')

@section('title')
    Create a new category
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('categories.store')}}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">Title of a new category:</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                        <input class='btn btn-primary' type="submit" value="Create new category">
                </form>

            </div>
        </div>
    </div>

@endsection
