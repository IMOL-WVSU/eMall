<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\AddressOfUser;
use App\Models\Order;
use App\Models\Cart;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function placeOrder() {
        $carts = Cart::where('user_id', Auth::id())->get();
        $products = array();
        $address = $this->getShippingAddress();

        foreach($carts as $cart) {
            array_push($products, $this->getProduct($cart->product_id));
        }

        foreach($carts as $key=>$cart) {
            $order = new Order;

            $address_full = $address[$key]->street. ", "
                            .$address[$key]->brgy. ", "
                            .$address[$key]->municipality. ", "
                            .$address[$key]->province. " "
                            .$address[$key]->zipCode;

            $order->user_id = Auth::id();
            $order->address = $address_full;
            $order->product_name = $products[$key]->product_name;
            $order->product_tag = $products[$key]->product_tag;
            $order->price = $products[$key]->price;
            $order->quantity = $cart->quantity;
            $order->total = $cart->quantity*$products[$key]->price;

            $order->save();

            $product = Product::find($products[$key]->id);

            $product->stock = ($products[$key]->stock)-($cart->quantity);
            $product->sold = ($products[$key]->sold)+($cart->quantity);

            $product->save();
        }

        $this->emptyCart();

        return redirect('order');
    }

    function getOrders() {
        $raw_data = Order::where('user_id', Auth::id())->get();
        // $raw_address = $raw_data->address->create([
        //     'name'=> $raw_data->name,
        //     'street'=> $raw_data->street,
        //     'brgy'=> $raw_data->brgy,
        //     'municipality'=> $raw_data->municipality,
        //     'province'=> $raw_data->province,
        //     'zipCode'=> $raw_data->zipCode,
        //     'contact_number'=> $raw_data->contact_number,
        // ]);

        $raw_address = array();
        foreach($raw_data as $data) {
            // $address_unsorted = collect($data->address);
            array_push($raw_address, $data->address);
        }

        return view('order', ['orders'=>$raw_data, 'address'=>$raw_address]);
        // return $raw_address;
        // return $raw_data[0]->address;
    }

    function emptyCart() {
        Cart::where('user_id', Auth::id())->delete();
    }

    function getShippingAddress() {
        $raw_data = AddressOfUser::where('user_id', Auth::id())->get();

        return $raw_data;
    }

    function getProduct($product_id) {
        $raw_data = Product::find($product_id);

        return $raw_data;
    }

    function deductProductStock($product_id) {

    }
}
