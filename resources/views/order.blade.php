@extends('template/header')

@section('content')
    <div class="container w-75">
        <h1>Orders</h1>
        @foreach ($orders as $key=>$order)
            <div class="bg-success rounded my-2 p-4 text-light">
                <h5>Order ID: {{ $order->id }}</h5>
                <h3 class="fw-bold">{{ $order->product_name }}</h3>
                <h5>Category: {{ $order->product_tag }}</h5>
                <h5>Price: {{ number_format($order->price, 2, '.', ',') }} PHP</h5>
                <h5>Quantity: {{ $order->quantity }}</h5>
                <h5>Total: {{ number_format($order->total, 2, '.', ',') }} PHP</h5>
                <h5>Order Created: {{ $order->created_at }}</h5>
                <h5>Shipped to: {{ $order->address }}</h5>
            </div>
        @endforeach
        <div class="mt-4 text-success" aria-label="...">
            {{ $orders->links() }}
        </div>
    </div>
@endsection