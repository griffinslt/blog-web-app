@extends('layouts.myLayout')

@section('title', 'Update Post' )


@section('content')
    
@if (auth()->user()->id == $post->user_id)
    

<h1>Update Post</h1>
    {{Auth::user()->email}}
    <form method="POST" action="{{ route('posts.update') }}">
        @csrf
        <p>Title: <input type="text" name="title" value="{{ $post->title }}" ></p>
        <p>Body:</p>
        <textarea type="text" class="form-control" name="body" rows = "25" >{{ $post->body }}</textarea>
        <input name="post_id" type="hidden" value={{$post->id}}>
        <input type="submit" value="Submit" class="btn btn-primary">
        
        <a class="btn btn-danger" href="{{ route('posts.index') }}">Cancel</a>
    </form>

    
@else
<div class="alert alert-warning" role="alert">
You do not have access to this page
</div>
    
@endif







@endsection
    
