@extends('layouts.myLayout')

@section('title', 'Blog Post')

@section('content')

    @if (Auth::check())
        <h1> {{ $post->title }} </h1>

        <p><strong>by
                <a href="{{ route('users.user', ['user' => $post->user]) }}">{{ $post->user->name }}</a>
            </strong></p>
        <p></p>
        
        @if (count($post->categories) > 0)
            <p> <strong>Category/categories:</strong></p>
            @foreach ($post->categories as $category)
                <a class="btn btn-warning"
                    href="{{ route('category', ['category' => $category->id]) }}">{{ $category->name }}</a>
                @if ($post->user_id == auth()->user()->id or
                    auth()->user()->roles->contains('role_name', 'admin') or
                    auth()->user()->roles->contains('role_name', 'post_moderator'))
                    <form action="{{ route('category_post.destroy', ['post' => $post->id, 'category' => $category->id]) }}"
                        method="post" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm"> x </button>
                    </form>
                @endif
            @endforeach
        @endif



        <p></p>
        <p> {{ $post->body }} </p>

        @foreach ($post->pictures as $pic)
            <img src="{{ $pic->file_path }}">
            @if (auth()->user()->id == $post->user_id or
                auth()->user()->roles->contains('role_name', 'admin') or
                auth()->user()->roles->contains('role_name', 'post_moderator'))
                <form action=" {{ route('post-picture.destroy', ['post' => $post->id, 'picture' => $pic->id]) }}"
                    method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm"> Delete Picture </button>
                </form>
                <p></p>
            @endif
        @endforeach


        <hr />

        @if ($post->user_id == auth()->user()->id or
            auth()->user()->roles->contains('role_name', 'admin') or
            auth()->user()->roles->contains('role_name', 'post_moderator'))
            <form action=" {{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                <a class="btn btn-success" href=" {{ route('posts.edits.edit', ['post' => $post]) }} ">Edit Post</a>
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"> Delete Post</button>
            </form>
            <p></p>
            <a
                class="btn btn-info "href="{{ route('postPicture.index', ['user' => auth()->user()->id, 'post' => $post->id]) }}">Upload
                an Image</a>

            <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Add a Category
                </button>
                <ul class="dropdown-menu">
                    @foreach (App\Models\Category::all() as $category)
                        <li><a class="dropdown-item"
                                href="{{ route('add-category', ['post' => $post, 'category' => $category]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>

            <hr />
        @endif


        @livewire('commenter', ['users' => $users, 'post' => $post, 'comments' => $comments->where('post_id', '=', $post->id)->toArray()])

    @endif
@endsection
