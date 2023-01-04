@extends('layouts.myLayout')

@section('title', 'Blog Posts')

<link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />

@section('content')



    <h1> Blog Posts</h1>
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Filter by Post Category
        </button>
        <ul class="dropdown-menu">
            @foreach (App\Models\Category::all() as $category)
                <li><a class="dropdown-item" href="/posts/category/{{ $category->id }}">{{ $category->name }}</a></li>
            @endforeach


            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ route('posts.index') }} ">All</a></li>
        </ul>
    </div>

    <p></p>
    <p></p>

    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <a href="{{ route('posts.post', ['post' => $post->id]) }}">
                <h3> {{ $post->title }} </h3>
            </a>
            <p> by

                @foreach ($users as $user)
                    @if ($post->user_id == $user->id)
                        <a href="{{ route('users.user', ['user' => $user]) }}">{{ $user->name }}</a>
                    @endif
                @endforeach

            </p>
            <hr />
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No posts yet</p>
    @endif





    <a class="btn btn-primary" href="{{ route('posts.create') }}">Create Post</a>



@endsection
