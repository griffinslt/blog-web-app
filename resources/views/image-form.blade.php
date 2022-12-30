@extends('layouts.mylayout')

@section('title', 'Upload an Image')

@section('content')
    @if (auth()->user()->id == $user->id)
        <h1>Image Upload</h1>
        

        <form method="POST" action="{{ route('image.store',['user' => $user->id]) }}" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control" name="image" />
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>


    @else
        <div class="alert alert-warning" role="alert">
            You do not have access to this page.
        </div>
    @endif
@endsection
