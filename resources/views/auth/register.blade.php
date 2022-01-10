<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .vertical-center {min-height: 100%; min-height: 100vh; display: flex; align-items: center;} body {background: url("/img/reg-bg.png") no-repeat; background-size: cover;}
    </style>
    <title>Register | Emall</title>
</head>
<body>
    <nav class="bg-success fixed-top p-2">
        <div class="d-flex justify-content-between">
            <a href="{{ url('/') }}" class="text-decoration-none">
                <h2 class="text-white">eMall</h2>
            </a>
            <div>
                <a href="{{ url('/') }}/login">
                    <button  class="text-decoration-none px-4 py-2 btn btn-warning">
                        Login
                    </button>
                </a>
            </div>
        </div>
    </nav>

    <form method="post">
        <div class="container vertical-center w-75">
            <div class="container w-50">
                <div class="bg-light rounded p-3 shadow">
                    <h2 class="text-center py-2 text-success">Register</h2>
                    @csrf
                    <div class="input-group d-inline-flex pb-2">
                        <span class="input-group-addon rounded-start my-auto mx-1">
                            <span class="material-icons text-success">
                                badge
                            </span>
                        </span>
                        <input class="form-control" id="full" name="name" type="text" placeholder="Full Name">
                    </div>

                    <div class="input-group d-inline-flex pb-2">
                        <div class="input-group-addon rounded-start my-auto mx-1">
                            <span class="material-icons text-success">
                                account_circle
                            </span>
                        </div>
                        <input
                            class="form-control"
                            id="userName"
                            name="username"
                            type="text"
                            placeholder="Username"
                            autocomplete="username"
                        >
                    </div>

                    <div class="input-group d-inline-flex pb-2">
                        <div class="input-group-addon rounded-start my-auto mx-1">
                            <span class="material-icons text-success">
                                email
                            </span>
                        </div>
                        <input class="form-control" id="email" name="email" type="email" placeholder="Email">
                    </div>

                    <div class="input-group d-inline-flex pb-2">
                        <div class="input-group-addon rounded-start my-auto mx-1">
                            <span class="material-icons text-success">
                                password
                            </span>
                        </div>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Create Password">
                    </div>

                    <div class="input-group d-inline-flex pb-2">
                        <div class="input-group-addon rounded-start my-auto mx-1">
                            <span class="material-icons text-success">
                                password
                            </span>
                        </div>
                        <input
                                class="form-control"
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                placeholder="Retype Password"
                            >
                    </div>

                    <button type="submit" class="btn btn-warning mt-3 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Let's Get Started!
                    </button>
                </div>
                @if (session('status'))
                    <div class="container bg-success rounded shadow my-2 w-100 p-2 px-3 text-white">
                        {{ session('status') }}
                    </div>
                @endif
            
                @if ($errors->any())
                    <div class="container bg-success rounded shadow mt-2 w-100 p-2 px-3 text-white">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            
        </div>
        
    </form>

</body>
</html>
