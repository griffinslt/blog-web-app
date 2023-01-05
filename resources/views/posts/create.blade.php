@extends('layouts.myLayout')

@section('title', 'Create Post')


@section('content')
    <h1>Create a Post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p>Title: <input type="text" name="title" size = '100'></p>
        <p>Body:</p>
        <textarea type="text" class="form-control" name="body" rows="20"></textarea>
        <input type="submit" value="Submit" class="btn btn-primary">
        


        <a class="btn btn-danger" href="{{ route('posts.index') }}">Cancel</a>
    </form>
        <p></p>
        <p></p>
        <h5>Unsure what to write?</h5>
        <a class = "btn btn-outline-primary"href="{{route('posts.storeJoke')}}">Generate a Random Joke</a>
@endsection
