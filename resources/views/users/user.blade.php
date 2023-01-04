@extends('layouts.myLayout')

@section('title', 'User Account')



    <link rel="icon" type="image/png" href="{{ $user->picture->file_path }}" sizes="16x16">


    @section('content')
    @if (Auth::check())



        <h1>Account Details</h1>


        <img src="{{ $user->picture->file_path }}" class="img-thumbnail" width="300" height="300">
        @if (auth()->user()->id == $user->id or
            auth()->user()->roles->contains('role_name', 'admin'))
            <p></p>
            <a class="btn btn-success" href="{{ route('profilePicture.index', ['user' => $user->id]) }}">Change Profile
                Picture</a>
        @endif




        <ul>
            <li>Name: {{ $user->name }}</li>
            <li>Email: {{ $user->email }}</li>
        </ul>
        <h3>Posts</h3>
        @if ($posts->where('user_id', '=', $user->id)->count() > 0)


            <ul>
                @foreach ($posts as $post)
                    @if ($post->user_id == $user->id)
                        <li><a href="{{ route('posts.post', ['post' => $post->id]) }}"> {{ $post->title }}</a></li>
                    @endif
                @endforeach
            </ul>
        @else
            <p>No posts yet</p>
        @endif

        <h3>Comments</h3>

        @if ($comments->where('user_id', '=', $user->id)->count() > 0)
            <div class="container-fluid p-3 border bg-light overflow-auto" style="max-height: 450px;">
                <ul>




                    @foreach ($comments as $comment)
                        @if ($comment->user_id == $user->id)
                            @foreach ($posts as $post)
                                @if ($post->id == $comment->post_id)
                                    <li><a href="{{ route('posts.post', ['post' => $post->id]) }}"> {{ $post->title }}</a>
                                    </li>
                                    <p></p>
                                    {{ $comment->body }}
                                    <hr />
                                @endif
                            @endforeach
                        @endif
                    @endforeach


                </ul>
            </div>
        @else
            <p>No Comments yet</p>

        @endif

    @else

    <div class="alert alert-warning" role="alert">
        You are not logged in.
    </div>
    <div class="card">

        <div class="card-body bg-light">
            <h5 class="card-title">Return home to create an account or login</h5>
            <a href="{{ route('loginOrRegister') }}" class="btn btn-outline-primary">Home</a>
        </div>
    </div>

    @endif
@endsection
