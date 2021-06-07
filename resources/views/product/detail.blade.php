@extends('template/header')

@section('content')
    <div class="d-md-flex container">
        <div class="container">
            <img
                src="{{ asset($product['img_path']) }}"
                alt="Picture of {{ $product['product_name'] }}"
                style="width: 400px; height: 400px; max-width: 400px"
            >
        </div>
        <div class="container">
            <h1>{{ $product['product_name'] }}</h1>
            
            <h2>{{ number_format($product['price'], 2, '.', ',') }} PHP</h2>
            <span class="badge bg-success fs-6 my-2">
                {{ $product['product_tag'] }} | {{ $product['stock'] }} left
            </span>
            @if ($product['stock'] >= 1)
                <form action="{{ url('/') }}/cart" method="post" class="py-3">
                    @csrf
                    <div class="input-group">
                        <input class="form-control w-25" type="hidden" name="product_id" value={{ $product['id'] }}>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="input-group">
                                <label class="my-auto" for="quantity">Qty</label>
                                <input
                                    class="form-control ms-2 rounded"
                                    type="number"
                                    name="quantity"
                                    min="0"
                                    value=1
                                    oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : 1"
                                >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning">Add To Cart</button>
                    </div>
                </form>
            @else
                <h3>Product Not Yet Available</h3>
            @endif
            <p>{{ $product['product_description'] }}</p>
        </div>
    </div>
    <div class="container mt-5">
        <h2>Products You May Like</h2>
        <div class="row py-2">
            @foreach($related_products as $product)
            <div class="container col">
                <a href="{{ url('/') }}/product/{{ $product['id'] }}" class="text-decoration-none text-light">
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