<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
    <h1>Cart</h1>
    <form action="home" method="get">
        @csrf
        <button type="submit">Home</button>
    </form>
    <form action="order" method="get">
        @csrf
        <button type="submit">Orders</button>
    </form>
    @empty($cart_items)
        Cart is empty.
    @else
        @foreach ($cart_items as $key => $cart)
            <a href="product/{{ $products[$key]['id'] }}">
                <h2>{{ $products[$key]['product_name'] }}</h2>
            </a>
            <h4>{{ $products[$key]['price'] }} PHP</h4>
            <h4>{{ $cart['quantity'] }} items/s</h4>
            <h4>Total {{ $cart['quantity']*$products[$key]['price'] }} PHP</h4>
            <form action="remcart" method="post">
                @csrf
                <input type="hidden" name="cart_id" value={{ $cart['id'] }}>
                <button type="submit">Remove</button>
            </form>
        @endforeach             
    @endempty
    <h1>Total
        <?php
            $total = 0;
            foreach ($products as $key => $product) {
                $total += $product['price']*($cart_items[$key]['quantity']);
            }

            echo $total;
        ?> PHP
    </h1>
    <form action="checkout" method="post">
        @csrf
        <button type="submit">Checkout</button>
    </form>
</body>
</html>