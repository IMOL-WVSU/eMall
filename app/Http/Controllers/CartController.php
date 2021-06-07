<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\AddressOfUser;
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
        $raw_address = AddressOfUser::where('user_id', Auth::id())->get();

        $isDataEmpty = collect($raw_address)->isEmpty();

        $addressSet = $isDataEmpty ? false : true;

        if($addressSet) {
            $address = $raw_address[0]['street'].', '.
                       $raw_address[0]['brgy'].', '.
                       $raw_address[0]['municipality'].', '.
                       $raw_address[0]['province'].' '.
                       $raw_address[0]['zipCode'].' Contact: '.
                       $raw_address[0]['contact_number'];
        } else {
            $address = null;
        }

        foreach($raw_data as $item) {
            array_push($raw_products, $this->getProduct($item->product_id));
        }

        return view(
            'cart',
            ['cart_items'=>$raw_data,
            'products'=>$raw_products,
            'addressSet'=>$addressSet,
            'address'=>$address,
            'page_title'=>"Cart"]);
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
