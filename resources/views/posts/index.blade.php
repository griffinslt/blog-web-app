@extends('layouts.myLayout')

@section('title', 'Blog Posts')

<link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    
@section('content')
    


      <h1> Blog Posts</h1>
      
      @if ($posts->count() > 0)
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
      {{ $posts->links() }}
      @else
          <p>No posts yet</p>
      @endif
      


    

    <a class="btn btn-primary" href="{{ route('posts.create') }}">Create Post</a>
   
  

  
@endsection

