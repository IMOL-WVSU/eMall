@extends('template/header')

@section('content')
    @can('manage-products')
        <div class="my-5">
            <div class="container w-50 my-4">
                <h1>Product Management</h1>
                <a href="{{ url('') }}/manageproduct" class="text-decoration-none">
                    <button class="btn btn-success">Manage Products</button>
                </a>
            </div>
            <div class="container w-50">
                <form action="addproduct" method="post" enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-center">Add a Product</h2>
                    <br>
                    <div class="input-group">
                        <label class="w-25 my-auto border-none" for="product_name">Product Name</label>
                        <input class="form-control w-50 rounded" type="text" name="product_name" id="">
                    </div>
                    <br>
                    <div class="input-group">
                        <label class="w-25 my-auto border-none" for="product_tag">Tag</label>
                        <input class="form-control w-50 rounded" type="text" name="product_tag" id="">
                    </div>
                    <br>
                    <div class="input-group">
                        <label class="w-25 border-none" for="product_description">Description</label>
                        <textarea class="form-control" type="text" name="product_description" id=""></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <label class="w-25 my-auto border-none" for="price">Price</label>
                        <input class="form-control w-50 rounded" type="number" name="price" id="">
                    </div>
                    <br>
                    <div class="input-group">
                        <label class="w-25 my-auto border-none" for="stock">Stock</label>
                        <input class="form-control w-50 rounded" type="number" name="stock" id="">
                    </div>
                    <br>
                    <div class="input-group">
                        <label class="w-25 my-auto border-none" for="image">Image Preview</label>
                        <input class="form-control w-50 rounded" type="file" name="image" id="" accept="image/*">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-outline-success float-end">Add Product</button>
                </form>
            </div>
        </div>
        @can('add-employee')
            <div class="container w-50 my-5 pb-4">
                <h1 class="my-4">Employee Management</h1>
                <h2 class="text-center mb-4">Add a Manager</h2>
                <form action="registerSeller" method="post">
                    @csrf
                    <div class="input-group">
                        <label class="w-25 my-auto border-none" for="name">Name</label>
                        <input class="form-control w-50 rounded" type="text" name="name" id="" placeholder="Name">
                    </div>
                    <br>
                    <div class="input-group">
                        <label class="w-25 my-auto border-none" for="username">Username</label>
                        <input class="form-control w-50 rounded" type="text" name="username" id="" placeholder="Username">
                    </div>
                    <br>
                    <div class="input-group">
                        <label class="w-25 my-auto border-none" for="email">Email</label>
                        <input class="form-control w-50 rounded" type="email" name="email" id="" placeholder="Email">
                    </div>
                    <br>
                    <div class="input-group">
                        <label class="w-25 my-auto border-none" for="password">Password</label>
                        <input class="form-control w-50 rounded" type="password" name="password" id="" placeholder="Password">
                    </div>
                    <br>
                    <button class="btn btn-warning float-end" type="submit">Register A Seller</button>
                </form>
            </div>
        @endcan
    @endif
@endsection
