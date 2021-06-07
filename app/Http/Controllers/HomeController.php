<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;

class HomeController extends Controller
{
    function dashboardData() {
        $user_name = $this->getUserName();
        $hot_products = $this->getHotProducts();
        $cart_item_count = $this->countCartItems();
        $latest_products = $this->getLatestProducts();

        return view('home',
            ['user_name'=>$user_name,
            'hot_products'=>$hot_products,
            'cart_items'=>$cart_item_count,
            'latest_products'=>$latest_products,
            'page_title'=>"Home"
            ]);
    }

    function countCartItems() {
        $raw_data = Cart::where('user_id', Auth::id())->count();

        return $raw_data;
    }

    function getUserName() {
        $raw_data = User::where('id', Auth::id())->get('name');

        return $raw_data;
    }

    function getHotProducts() {
        $raw_data = Product::orderBy('sold_today', 'desc')->take(4)->get();

        return $raw_data;
    }

    function getLatestProducts() {
        $raw_data = Product::orderBy('id', 'desc')->take(4)->get();

        return $raw_data;
    }
}