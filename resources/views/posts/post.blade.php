@extends('layouts.myLayout')

@section('title', 'Blog Post')

@section('content')
<h1> {{ $post->title }} </h1>
<p> &emsp;&emsp; by 
    @foreach ($users as $user)
          @if ($post->user_id == $user->id)
              {{$user->name}}
          @endif
        @endforeach
</p>
<p></p>
<p></p>
<p> {{ $post->body }}</p>


@endsection 