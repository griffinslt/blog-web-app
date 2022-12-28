@extends('layouts.myLayout')

@section('title', 'Welcome!')

@section('content')


<h1>Welcome To The Blog Page</h1>
    

      


      <div class="container-fluid" >
        <div class="row">
          <div class="col">
            <div class="card">
        
                <div class="card-body bg-light">
                  <h5 class="card-title">Already Have an account?</h5>
                  <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                </div>
              </div>


          </div>
          <div class="col">
            <div class="card">
        
                <div class="card-body bg-light">
                  <h5 class="card-title">New?</h5>
                  <a href="{{ route('register') }}" class="btn btn-outline-success">Register</a>
                </div>
              </div>


          </div>
        </div>
      </div>

@endsection
    
