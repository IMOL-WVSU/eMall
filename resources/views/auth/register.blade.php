<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <a href="login">Login</a>
    <a href="home">Home</a>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="username">Username</label>
        <input type="text" name="username" id="">
        <br>
        <label for="name">Name</label>
        <input type="text" name="name" id="">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="">
        <br>
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" name="password_confirmation" id="">
        <br>
        <button type="submit">Register</button>
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