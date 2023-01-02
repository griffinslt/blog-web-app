@extends('layouts.myLayout')

@section('title', 'Users')

@section('content')


    <div class="container-fluid">
        <h1> Users</h1>
        @foreach ($users as $user)
            <div class="card mx-3 my-1" style="width: 18rem; display: inline-block;">
                <img src="{{ $user->profilePicture->file_path }}" class="card-img-top" width="300" height="300">
                <div class="card-body">
                    <a href="{{ route('users.user', ['user' => $user->id]) }}">
                        <h5>{{ $user->name }}</h5>
                    </a>
                    @if (auth()->user()->roles->contains('role_name', 'admin') and
                        $user->id != auth()->user()->id)
                        <form action=" {{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"> Delete User</button>
                        </form>
                    @else
                        <p class = "text-white">.</p>
                        <p></p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>





@endsection
