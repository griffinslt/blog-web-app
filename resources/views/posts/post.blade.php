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
    @endforeach

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



    {{-- <h3> Comments </h3> --}}

    {{-- <div class= "p-3 border bg-light">
@foreach ($comments as $comment)
    @if ($comment->post_id == $post->id)
        @foreach ($users as $user)
            @if ($comment->user_id == $user->id)
                <a href="{{ route('users.user', ['user' => $user]) }}">{{ $user->name }}</a>
                <p></p>
            @endif
        @endforeach
        {{ $comment->body }}
        @if (Auth::user()->id == $comment->user_id)
            <form 
                {{-- action=" {{ route('comments.destroy', ['id' => $comment->id]) }}" --}}{{--
                method="post">
                @csrf
                @method('delete')
                <button type="submit" class = "btn btn-danger"> Delete </button>
            </form> 
        @endif
        <hr/>
        
    @endif
@endforeach
</div>-}}

{{-- [method="POST" action="{{ route('comments.store') }}"] --}}
    {{-- <form  >
    @csrf
    <textarea type = "text" class="form-control" name= "body" rows="4"></textarea>
    <input name="post_id" type="hidden" value={{$post->id}}>
    <input class="btn btn-outline-primary" type ="submit" value ="Write Comment">
    <button wire:submit="submit" class= "btn btn-outline-primary">+</button>

    <a href="/posts" class="btn btn-primary ">Go Back</a>
</form> --}}

    @livewire('commenter', ['users' => $users, 'post' => $post, 'oldComments' => $comments->where('post_id', '=', $post->id)->toArray()])







@endsection
