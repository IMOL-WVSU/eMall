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
}
