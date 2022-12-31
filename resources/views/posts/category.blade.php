@extends('layouts.myLayout')

@section('title', 'Category Search')

@section('content')
    <h1> Blog Posts: {{ $category->name }}</h1>

    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Filter by Post Category
        </button>
        <ul class="dropdown-menu">
            @foreach (App\Models\Category::all() as $categoryFind)
                <li><a class="dropdown-item" href="/posts/category/{{ $categoryFind->id }}">{{ $categoryFind->name }}</a></li>
            @endforeach

            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{route('posts.index')}}">All</a></li>
        </ul>
    </div>

    <p></p>
    <p></p>


    <p></p>
    @if ($category->posts)
        @foreach ($category->posts as $post)
            <a href="{{ route('posts.post', ['post' => $post->id]) }}">
                <h3> {{ $post->title }} </h3>
            </a>
            <p> by
                <a href="{{ route('users.user', ['user' => $post->user]) }}">{{ $post->user->name }}</a>
            </p>
            <hr />
        @endforeach
    @else
        No posts for this category yet
    @endif






@endsection
