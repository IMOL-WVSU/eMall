@extends('template/header')

@section('content')
<div class="container pb-4">
    @if(Auth::id())
        <h1>Welcome, {{ $user_name[0]['name'] }}</h1>
    @else 
        <h1>Welcome, guest</h1>
    @endif
    <h2>Hot Products</h2>
    <div class="row mx-2">
        @foreach($hot_products as $product)
        <div class="container col">
            <a href="product/{{ $product['id'] }}" class="text-decoration-none text-light">
                <div title="{{ $product['product_name'] }}" class="container rounded p-0 my-1 bg-success" style="min-width: 250px; max-width: 250px;">
                  <img src="{{ asset($product['img_path']) }}" alt="{{ $product['product_name'] }}" style="width: 100%; height: 250px;">
                   <div class="container py-2">
                    <h5 class="font-weight-bold"  style="overflow: hidden; text-overflow: ellipsis;  white-space: nowrap">{{ $product['product_name'] }}</h5>
                    <h5>{{ number_format($product['price'], 2, '.', ',') }} PHP</h5>
                    <sup>{{ $product['product_tag'] }} | </sup>
                    <sup>{{ $product['sold_today'] }} sold today</sup>
                   </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <br>

    <h2>Latest Products</h2>
    <div class="row mx-2">
        @foreach($latest_products as $product)
            <div class="container col">
                <a href="product/{{ $product['id'] }}" class="text-decoration-none text-light">
                    <div title="{{ $product['product_name'] }}" class="container rounded p-0 my-1 bg-success" style="min-width: 250px; max-width: 250px;">
                    <img src="{{ asset($product['img_path']) }}" alt="{{ $product['product_name'] }}" style="width: 100%; height: 250px;">
                    <div class="container py-2">
                        <h5 class="font-weight-bold"  style="overflow: hidden; text-overflow: ellipsis;  white-space: nowrap">{{ $product['product_name'] }}</h5>
                        <h5>{{ number_format($product['price'], 2, '.', ',') }} PHP</h5>
                        <sup>{{ $product['product_tag'] }} | </sup>
                        <sup>{{ $product['stock'] }} available</sup>
                    </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <br>

    <h2>Browse Products</h2>
    <div class="row mx-2">
        @foreach($browse_products as $product)
            <div class="container col">
                <a href="product/{{ $product['id'] }}" class="text-decoration-none text-light">
                    <div title="{{ $product['product_name'] }}" class="container rounded p-0 my-1 bg-success" style="min-width: 250px; max-width: 250px;">
                    <img src="{{ asset($product['img_path']) }}" alt="{{ $product['product_name'] }}" style="width: 100%; height: 250px;">
                    <div class="container py-2">
                        <h5 class="font-weight-bold"  style="overflow: hidden; text-overflow: ellipsis;  white-space: nowrap">{{ $product['product_name'] }}</h5>
                        <h5>{{ number_format($product['price'], 2, '.', ',') }} PHP</h5>
                        <sup>{{ $product['product_tag'] }} | </sup>
                        <sup>{{ $product['stock'] }} available</sup>
                    </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection