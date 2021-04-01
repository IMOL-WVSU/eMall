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
    @foreach ($orders as $order)
        <h3>Order ID: {{ $order->id }}</h3>
        <h3>Product: {{ $order->product_name }}</h3>
        <h3>Category: {{ $order->product_tag }}</h3>
        <h3>Price: {{ $order->price }}</h3>
        <h3>Quantity: {{ $order->quantity }}</h3>
        <h3>Total: {{ $order->total }}</h3>
        <h3>Order Created: {{ $order->created_at }}</h3>
        <h3>{{ $order->address }}</h3>

        <?php
            // $addr = array($order->address);
            // foreach($addr as $address) {
            //     echo "
            //     <h3>Street:" + $address[0] +"</h3>
            //     <h3>Barangay:"+$address[1]+"</h3>
            //     <h3>Municipality:"+$address[2]+"</h3>
            //     <h3>Province:"+$address-[3]+"</h3>
            //     <h3>Zip Code:"+$address[4]+"</h3>
            //     <h3>Contact Number:"+$address[5]+"</h3>";
            // }
        ?>
        {{-- @foreach ($addresses as $address)
            <h3>Street: {{ $address->street }}</h3>
            <h3>Barangay: {{ $address->brgy }}</h3>
            <h3>Municipality: {{ $address->municipality }}</h3>
            <h3>Province: {{ $address->province }}</h3>
            <h3>Zip Code: {{ $address->zipCode }}</h3>
            <h3>Contact Number: {{ $address->contact_number }}</h3>
        @endforeach --}}
        <hr>
    @endforeach
</body>
</html>