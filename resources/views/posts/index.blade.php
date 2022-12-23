@extends('layouts.myLayout')

@section('title', 'Blog Posts')
    
@section('content')
    

    <div class="container-fluid">
      <h1> Blog Posts</h1>
      @foreach ($posts as $post)
        <a href="{{ route('posts.post', ['post' => $post->id])}}"><h3> {{ $post->title }} </h3></a>
        <p> by 

        @foreach ($users as $user)
          @if ($post->user_id == $user->id)
              <a href="{{ route('users.user', ['user' => $user]) }}">{{$user->name}}</a>
          @endif
        @endforeach

        </p>
        <hr/>
      @endforeach
    </div>

    <a class="btn btn-primary" href="">Create Post</a>
   
  

  
@endsection

