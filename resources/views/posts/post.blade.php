@extends('layouts.myLayout')

@section('title', 'Blog Post')

@section('content')
<h1> {{ $post->title }} </h1>
<p> <strong> by 
    @foreach ($users as $user)
          @if ($post->user_id == $user->id)
              <a href="{{ route('users.user', ['user' => $user]) }}">{{ $user->name }}</a>
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
        @foreach ($users as $user)
            @if ($comment->user_id == $user->id)
                <a href="{{ route('users.user', ['user' => $user]) }}">{{ $user->name }}</a>
                <p></p>
            @endif
        @endforeach
        {{ $comment->body }}
        <hr/>
        
    @endif
@endforeach
</div>
<form method="POST" action="{{ route('comments.store') }}" >
    @csrf
    <textarea type = "text" class="form-control" name= "body" rows="4"></textarea>
    <input name="post_id" type="hidden" value={{$post->id}}>
    <input class="btn btn-outline-primary" type ="submit" value ="Write Comment">


    <a href="/posts" class="btn btn-primary ">Go Back</a>
</form>
 
@if(Auth::user()->id == $post->user_id)
    <form 
    action=" {{ route('posts.destroy', ['post' => $post->id]) }}" 
    method="post">
    @csrf
    @method('delete')
    <button type="submit" class = "btn btn-danger"> Delete </button>
</form>
@endif

@endsection 