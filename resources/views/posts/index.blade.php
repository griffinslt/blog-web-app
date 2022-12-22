@extends('layouts.myLayout')

@section('title', 'Blog Posts')
    
@section('content')
    

    <div class="container-fluid">
      <h1> Blog Posts</h1>
      @foreach ($posts as $post)
        <h3> {{ $post->title }} </h2>
        <p> by 

        @foreach ($users as $user)
          @if ($post->user_id == $user->id)
              {{$user->name}}
          @endif
        @endforeach

        </p>
        <hr/>
      @endforeach
    </div>
   
  

  
@endsection

