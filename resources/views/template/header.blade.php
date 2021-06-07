<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>{{ $page_title }} | eMall</title>
</head>
<body class="min-vh-80">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">eMall</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <form class="d-flex" action="{{url("/")}}/search">
                <input class="form-control me-2" type="search" placeholder="Search" name="query" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            @if (Auth::id())
                <a href="{{ url("/") }}/cart" class="text-decoration-none mx-2 d-flex">
                    <button class="btn btn-success">Cart</button>
                </a>
                <a href="{{ url("/") }}/order" class="text-decoration-none me-2 d-flex">
                    <button class="btn btn-success">Orders</button>
                </a>
                <a href="{{ url("/") }}/profile" class="text-decoration-none me-2 d-flex">
                    <button class="btn btn-success">Profile</button>
                </a>

                @can ('manage-products')
                    <a href="{{ url("/") }}/admin" class="text-decoration-none me-2 d-flex">
                        <button class="btn btn-success">Admin</button>
                    </a>
                @endcan

                <form action="{{ route('logout') }}" method="post" class="me-2 d-flex">
                    @csrf
                    <button type="submit" class="btn btn-warning">Logout</button>
                </form>
            @else
                <a href="{{ url("/") }}/login" class="mx-2 d-flex text-decoration-none">
                    <button class="btn btn-success">Login</button>
                </a>
                <a href="{{ url("/") }}/register" class="mx-2 d-flex text-decoration-none">
                    <button class="btn btn-success">Register</button>
                </a>
            @endif
            </div>
        </div>
    </nav>

    <div class="main" style="margin-top: 80px; min-height: 83vh;">
        @yield('content')
    </div>

    <footer class="footer bg-dark text-light py-4 mt-4">
        <div class="container d-flex text-center">
            <h1 class="my-auto col-4">
                <span class="text-sectheme">eMall</span> by IMOL</h1>
            <h6 class="my-auto col-4">
                Developed by <span class="text-warning">I.M.O.L.</span>
            </h6>
            <h6 class="my-auto col-4">Copyright 2021</h6>
        </div>
   </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>