<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>body {background: url("/img/login-bg.png") no-repeat; background-size: cover;}</style>
    <title>Login | Emall</title>
</head>
<body class="bg-success text-light min-vh-100">
    <nav class="bg-success fixed-top p-2">
        <div class="d-flex justify-content-between">
            <a href="{{ url('/') }}" class="text-decoration-none">
                <h2 class="text-white">eMall</h2>
            </a>
            <div>
                <a href="{{ url('/') }}/register">
                    <button  class="text-decoration-none px-4 py-2 btn btn-warning">
                        Register
                    </button>
                </a>
            </div>
        </div>
    </nav>
    <div class="d-flex">
       <div class="container w-100 ms-5">
            <div class="container" style="min-height: 50vh"></div>
            <h1 class="display-1">
                Welcome to eMall!
            </h1>
            <h4>
                with over
                    &nbsp;<span class="bg-warning rounded text-dark">&nbsp;{{ $total_product-1 }}+&nbsp;</span>&nbsp;
                products available. Shop now!
            </h4>
       </div>

       <div class="container">
            <div style="min-height: 20vh"></div>
            <form class="container rounded form-group w-50 bg-light p-3 h-auto" action="{{ route('login') }}" method="post">
                <h2 class="text-center text-success pb-2">Login</h2>
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text material-icons text-success" id="username-prepend">
                        account_circle
                    </span>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Username"
                        aria-label="Username"
                        aria-describedby="username-prepend"
                        name="username"
                        autocomplete="username"
                    >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text material-icons text-success" id="password-prepend">
                        password
                    </span>
                    <input
                        type="password"
                        class="form-control"
                        placeholder="Password"
                        aria-label="password"
                        aria-describedby="password-prepend"
                        name="password"
                        autocomplete="password"
                    >
                </div>
            
                <button type="submit" class="btn btn-outline-success mt-3 w-100">
                    Login
                </button>

                <div class="d-flex mt-3 justify-content-center w-100">
                    <div class="bg-secondary mt-lg-2" style="width: 40px; height: 1px;color:#049635"></div>
                    <small class="text-success text-small">&nbsp;Haven't had an account yet?&nbsp;</small>
                    <div class="bg-secondary mt-lg-2" style="width: 40px; height: 1px;color:#049635"></div>
                </div>

                <a href="{{ route('register') }}">
                    <span class="btn bg-warning w-100 rounded my-2">
                        Sign Up
                    </span>
                </a>
            </form>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>