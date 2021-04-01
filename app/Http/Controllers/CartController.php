<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function addToCart(Request $req) {
        if(!Auth::user()) {
          return redirect('login');
        }

        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->product_id = $req->product_id;
        $cart->quantity = $req->quantity;

        $cart->save();

        return redirect('cart');
    }

    function retrieveCart() {
        $raw_data = Cart::where('user_id', Auth::id())->get();
        $raw_products = array();

        foreach($raw_data as $item) {
            array_push($raw_products, $this->getProduct($item->product_id));
        }

        return view('cart', ['cart_items'=>$raw_data, 'products'=>$raw_products]);
    }

    function removeItem(Request $req) {
        Cart::where('id', $req->cart_id)->delete();

        return redirect('cart');
    }

    function getProduct($product_id) {
        $raw_data = Product::find($product_id);

        return $raw_data;
    }
}
