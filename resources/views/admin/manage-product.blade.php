@extends('template/header')

@section('content')
   <div class="container">
    @foreach ($products as $key=>$product)
    <div class="modal fade" id="editModal{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="updateproduct" method="post" class="form">
                <div class="modal-content">
                    <div class="modal-header" style="background: lightgreen">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <span class="material-icons">
                                home
                            </span>
                        </button> --}}
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input class="form-control"
                            type="text"
                            name="product_name"
                            value="{{ $product['product_name'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tag</label>
                            <input class="form-control" name="product_tag" type="text" value="{{ $product['product_tag'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="product_description" type="text">{{ $product['product_description'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input class="form-control" name="price" type="number" value="{{ $product['price'] }}">
                        </div>
                        <div class="form-group">
                            <label for="">Additional Stock | Current: {{ $product['stock'] }}</label>
                            <input class="form-control" name="new_stock" type="number" value=1>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container rounded border my-1 row py-1 px-0">
        <div class="col-10 my-auto">
            <h3>{{ $product['product_name'] }}</h3>
        </div>
        <div class="col-2 align-middle my-auto px-0">
            <form action="remproduct" method="post">
                <button
                type="button"
                class="btn btn-actions bg-warning"
                data-bs-toggle="modal"
                data-bs-target="#editModal{{ $key }}">
                Edit
            </button>
            @csrf
            <input type="hidden" name="id" value={{ $product['id'] }}>
            <button class="btn btn-danger btn-actions">Delete</button>
        </form>
    </div>
</div>
@endforeach
    <div class="mt-4" aria-label="...">
        {{ $products->links() }}
    </div>
</div>
@endsection