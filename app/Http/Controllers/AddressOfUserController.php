<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddressOfUser;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AddressOfUserController extends Controller
{
    function getShippingAddress() {
        $raw_data = AddressOfUser::where('user_id', Auth::id())->get();

        return $raw_data;
    }

    function getProduct($product_id) {
        $raw_data = Product::find($product_id);

        return $raw_data;
    }
}
