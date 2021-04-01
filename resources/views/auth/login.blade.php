<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <a href="register">Register</a>
    <a href="home">Home</a>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="username">Username</label>
        <input type="text" name="username" id="">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="">
        <br>
        <button type="submit">Login</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>