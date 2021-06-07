@extends('template/header')

@section('content')
    <div class="container">
        <h1>Search result for '{{ $query }}'</h1>
        @if($products)
            <div class="row">
                @foreach($products as $product)
                <div class="container col">
                    <a href="product/{{ $product['id'] }}" class="text-decoration-none text-light">
                        <div title="{{ $product['product_name'] }}" class="container rounded p-0 my-1 bg-success" style="min-width: 250px; max-width: 250px;">
                        <img src="{{ asset($product['img_path']) }}" alt="{{ $product['product_name'] }}" style="width: 100%; height: 250px;">
                            <div class="container py-2">
                                <h5 class="font-weight-bold"  style="overflow: hidden; text-overflow: ellipsis;  white-space: nowrap">{{ $product['product_name'] }}</h5>
                                <h5>{{ number_format($product['price'], 2, '.', ',') }} PHP</h5>
                                <sup>{{ $product['product_tag'] }} | </sup>
                                <sup>{{ $product['stock'] }} left</sup>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        @else
            <h2>No products found.</h2>
        @endempty
    </div>
@endsection