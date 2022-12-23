@extends('layouts.myLayout')

@section('title', 'User Account')

@section('content')

<h1>Account Details</h1>
@foreach ($profilePictures as $profilePicture)
            @if ($profilePicture->user_id == $user->id)
            <img src="{{ $profilePicture->file_path }}" class="img-thumbnail" alt="...">
            @endif
        @endforeach
<ul>   
    <li>Name: {{$user->name}}</li>
    <li>Email: {{$user->email}}</li>
</ul>
<h3>Posts</h3>
<ul>
@foreach ($posts as $post)
    @if ($post->user_id == $user->id)
        
            <li><a href="{{route('posts.post', ['post' => $post->id])}}"> {{ $post->title }}</a></li>
        
    @endif
@endforeach
</ul>
@endsection