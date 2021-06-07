@extends('template/header')

@section('content')
    <div class="container">
        <h1>Cart</h1>
        <div style="min-height: 60vh">
            @empty($cart_items)
            @else
                @foreach ($cart_items as $key => $cart)
                    <div class="py-4 d-flex justify-content-between">
                        <div class="w-75">
                            <a href="product/{{ $products[$key]['id'] }}" class="text-decoration-none text-success">
                                <h2>{{ $products[$key]['product_name'] }}</h2>
                            </a>
        
                            @if ($products[$key]['stock'] <= 0)
                                <h3>Product Not Available</h3>
                            @endif
        
                            <h5>{{ number_format($products[$key]['price'], 2, '.', ',') }} PHP</h5>
                            <h5>{{ $cart['quantity'] }} item/s</h5>
                            <h5>Total {{ number_format(($cart['quantity']*$products[$key]['price']), 2, '.', ',') }} PHP</h5>
                        </div>
                        <form action="remcart" method="post">
                            @csrf
                            <input type="hidden" name="cart_id" value={{ $cart['id'] }}>
                            <button type="submit" class="btn btn-warning">Remove</button>
                        </form>
                    </div>
                @endforeach   
            @endempty
        </div>
        <hr>
        <div class="d-flex justify-content-between">
            <h1 class="fw-bold"><span class="fs-4">Total</span> 
                <?php
                    $total = 0;
                    foreach ($products as $key => $product) {
                        $total += $product['price']*($cart_items[$key]['quantity']);
                    }
                    echo number_format($total, 2, '.', ',');
                ?> PHP
            </h1>
            @if ($addressSet)
                <form action="checkout" method="post" class="my-auto">
                    @csrf
                    <button type="submit" class="btn btn-success">Checkout</button>
                </form>
            @else
                <h3>Set your address first.</h3>
            @endif
        </div>
        <h6>Ships to {{ $address }}</h6>
    </div>
@endsection