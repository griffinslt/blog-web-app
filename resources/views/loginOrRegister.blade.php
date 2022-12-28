<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
    crossorigin="anonymous"
  />
  <title>Welcome to the Blog!</title>

    

      
</head>

<body>
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

    </body>

</html>
