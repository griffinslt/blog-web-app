@extends('layouts.myLayout')

@section('title', 'Blog Post')

@section('content')
<h1> {{ $post->title }} </h1>
<p> <strong> by 
    @foreach ($users as $user)
          @if ($post->user_id == $user->id)
              {{$user->name}}
          @endif
        @endforeach
    </strong>
</p>
<p></p>
<p></p>
<p> {{ $post->body }}</p>

<hr/>


   <h3> Comments </h2>
    <div class= "p-3 border bg-light">
@foreach ($comments as $comment)
    @if ($comment->post_id == $post->id)
        {{ $comment->body }}
        <hr/>
        
    @endif
@endforeach
</div>
 



@endsection 