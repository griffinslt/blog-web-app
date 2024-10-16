<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    @livewireStyles
</head>
<title>Blogs - @yield('title')</title>

<body>
    @if (Auth::check())
        @if (\Session::has('message'))
            <div class="alert alert-success">
                <ul>
                    {!! \Session::get('message') !!}
                </ul>
                @php
                    header('Refresh:2');
                @endphp

            </div>
        @endif
        @livewireScripts
        <div class="container-fluid">

            <div class="btn-group" role="group">
                <a class="btn btn-outline-primary" href="{{ route('posts.index') }}">Posts</a>
                <a class="btn btn-primary" href=" {{ route('dashboard') }}">Home</a>
                <a class="btn btn-outline-primary" href="{{ route('users.index') }}">Users</a>
            </div>

            @yield('content')

        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
</body>

</html>
