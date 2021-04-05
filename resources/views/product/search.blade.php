<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search result for '{{ $query }}'</title>
</head>
<body>
    <form action="home" method="get">
            @csrf
            <button type="submit">Home</button>
        </form>
    <form action="cart" method="get">
        @csrf
        <button type="submit">View Cart</button>
    </form>
    <h1>Search result for '{{ $query }}'</h1>
    @if($products)
        @foreach ($products as $product)
            <h2>{{ $product['product_name'] }}</h2>
            <h3>{{ $product['price'] }} PHP</h3>
            <h3>{{ $product['sold'] }}</h3>
            <h3>{{ $product['product_tag'] }}</h3>
            <a href="product/{{ $product['id'] }}">
                <button type="submit">View Product</button>
            </a>
        @endforeach
    @else
        <h2>No products found.</h2>
    @endempty
</body>
</html>