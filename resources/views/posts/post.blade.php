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
<div class="form-outline">
    <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
    <label class="form-label" for="textAreaExample"></label>
  </div>
<a class="btn btn-outline-primary" href="">Write Comment</a>
<a href="/posts" class="btn btn-primary ">Go Back</a>
 
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