<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    @if (Auth::id())
        <h1>Welcome, {{ $user_name[0]['name'] }}</h1>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <form action="profile" method="get">
            @csrf
            <button type="submit">Profile</button>
        </form>
        <form action="cart" method="get">
            @csrf
            <button type="submit">Cart ({{ $cart_items }})</button>
        </form>
    @else
        <h1>Welcome, guest</h1>
        <a href="login">Login</a>
        <a href="register">Register</a>
    @endif
    
    <form action="search">
        <input type="text" name="query" id="query" placeholder="Search for...">
        <button type="submit">Search</button>
    </form>

    <h1>Hot Products</h1>
    @foreach ($hot_products as $product)
        <h2>{{ $product['product_name'] }}</h2>
        <h3>{{ $product['price'] }} PHP</h3>
        <h3>{{ $product['sold'] }}</h3>
        <h3>{{ $product['product_tag'] }}</h3>
        <a href="product/{{ $product['id'] }}">
            <button type="submit">View Product</button>
        </a>
    @endforeach
</body>
</html>