<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
</head>
<body>
    <h1>Orders</h1>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <form action="home" method="get">
        @csrf
        <button type="submit">Home</button>
    </form>
    @foreach ($orders as $key=>$order)
        <h3>Order ID: {{ $order->id }}</h3>
        <h3>Product: {{ $order->product_name }}</h3>
        <h3>Category: {{ $order->product_tag }}</h3>
        <h3>Price: {{ $order->price }}</h3>
        <h3>Quantity: {{ $order->quantity }}</h3>
        <h3>Total: {{ $order->total }}</h3>
        <h3>Order Created: {{ $order->created_at }}</h3>
        <h3>Address: {{ $order->address }}</h3>
    @endforeach
</body>
</html>