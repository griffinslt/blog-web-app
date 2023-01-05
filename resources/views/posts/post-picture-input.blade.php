@extends('layouts.myLayout')

@section('title', 'Picture Upload')


@section('content')
    @if (auth()->user()->id == $post->user->id or
        auth()->user()->roles->contains('role_name', 'admin') or
        auth()->user()->roles->contains('role_name', 'post_moderator'))
        <h1>Image Upload</h1>


        <form method="POST" action="{{ route('post-picture.store', ['post' => $post->id]) }}" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control" name="image" />
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    @else
        <div class="alert alert-warning" role="alert">
            You do not have access to this page.
        </div>
    @endif
@endsection
