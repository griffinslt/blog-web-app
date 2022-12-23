@extends('layouts.myLayout')

@section('title', 'Users')
    
@section('content')
    

    <div class="container-fluid">
      <h1> Users</h1>
      @foreach ($users as $user)
        
        <a href="{{ route("users.user", ['user' => $user->id]) }}"><h3>{{ $user->name }}</h3></a>
        <hr/>
      @endforeach
    </div>

   
  

  
@endsection