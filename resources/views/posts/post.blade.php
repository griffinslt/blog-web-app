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
    <p> {{ $post->body }} </p>


    @php
        $pics = App\Models\PostPicture::where('post_id', '=', $post->id)->get();
    @endphp
    @foreach ($pics as $pic)

        <img src="{{ $pic->file_path }}">
        @if (auth()->user()->id == $post->user_id)
        <form action=" {{ route('post-picture.destroy', ['post' => $post->id, 'picture' => $pic->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"> Delete Picture </button>
        </form>
        <p></p>
        @endif
       
    @endforeach

    <hr/>

    @if ($post->user_id == auth()->user()->id)
        <form action=" {{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
            <a class="btn btn-success" href=" {{ route('posts.edits.edit', ['post' => $post]) }} ">Edit</a>
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"> Delete </button>
        </form>
        <p></p>
        <a class="btn btn-info "href="{{ route('postPicture.index', ['user' => auth()->user()->id, 'post' => $post->id]) }}">Upload
            an Image</a>
        <hr />
    @endif


 @livewire('commenter', ['users' => $users, 'post' => $post, 'comments' => $comments->where('post_id', '=', $post->id)->toArray()])







@endsection
