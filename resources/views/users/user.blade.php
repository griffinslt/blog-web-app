@extends('layouts.myLayout')

@section('title', 'User Account')
@foreach ($profilePictures as $profilePicture)
            @if ($profilePicture->user_id == $user->id)
            
            <link rel="icon" type="image/png" href="{{ $profilePicture->file_path }}" sizes="16x16">
            @endif
        @endforeach


@section('content')



<h1>Account Details</h1>
@php
    $found = false;
@endphp
@foreach ($profilePictures as $profilePicture)
            @if ($profilePicture->user_id == $user->id)
                <img src="{{ $profilePicture->file_path }}" class="img-thumbnail">
                @php
                    $found = true;
                @endphp
            @endif
@endforeach

@if ($found == false)
    @php
        $pp = [
            'user_id' => $user->id,
            'file_path' => url("images/blank-profile-picture.png"),
        ];
        App\Models\ProfilePicture::create($pp);
        header("Refresh:0");
        
    @endphp
@endif


<ul>   
    <li>Name: {{$user->name}}</li>
    <li>Email: {{$user->email}}</li>
</ul>
<h3>Posts</h3>
@if ($posts->where("user_id", "=", $user->id )->count() > 0)
    

<ul>
@foreach ($posts as $post)
    @if ($post->user_id == $user->id)
        
            <li><a href="{{route('posts.post', ['post' => $post->id])}}"> {{ $post->title }}</a></li>
        
    @endif
@endforeach
</ul>
@else
    <p>No posts yet</p>
@endif

<h3>Comments</h3>

@if ($comments->where("user_id", "=", $user->id )->count() > 0)
<div class= "container-fluid p-3 border bg-light overflow-auto" style="height: 450px;">
<ul>


    

@foreach ($comments as $comment)
    @if ($comment->user_id == $user->id)
        @foreach ($posts as $post)
            @if ($post->id == $comment->post_id)
                <li><a href="{{route('posts.post', ['post' => $post->id])}}"> {{ $post->title }}</a></li>
                <p></p>
                {{ $comment->body }}
                <hr/>
            @endif
        @endforeach
        
    @endif
@endforeach


</ul>
</div>
@else
<p>No Comments yet</p>
    
@endif
@endsection