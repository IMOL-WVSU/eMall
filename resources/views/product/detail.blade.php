<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product['product_name'] }}</title>
</head>
<body>
    <form action="../home" method="get">
        @csrf
        <button type="submit">Home</button>
    </form>
    <h1>
        {{ $product['product_name'] }}
        <sup>{{ $product['product_tag'] }} | </sup>
        <sup>{{ $product['stock'] }} left</sup>
    </h1>
    <h2>{{ $product['price'] }}</h2>
    <p>{{ $product['product_description'] }}</p>
    <form action="../cart" method="post">
        @csrf
        <input type="hidden" name="product_id" value={{ $product['id'] }}>
        <label for="quantity">Qty</label>
        <input type="number" name="quantity" id="" value=1>
        <button type="submit">Add To Cart</button>
    </form>
</body>
</html>