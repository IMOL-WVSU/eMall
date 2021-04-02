<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    function getProduct($id) {
        $raw_data = Product::find($id);

        if($raw_data == null) return redirect ('');

        return view('product.detail', ['product'=>$raw_data]);
    }

    function searchProducts(Request $req) {
        $query = $req->input('query');
        $raw_data = Product::where('product_name', 'like', '%'.$query.'%')->get();

        return view('product.search', ['products'=>$raw_data, 'query'=>$query]);
    }
}
