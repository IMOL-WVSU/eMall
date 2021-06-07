<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Product;

class ProductController extends Controller
{
    function getProduct($id) {
        $raw_data = Product::find($id);

        if($raw_data == null) return redirect ('');

        $related_products = Product::where('product_tag', 'like', '%'.$raw_data->product_tag.'%')
                            // ->whereNotIn('id', $raw_data->id)
                            ->inRandomOrder()
                            ->take(4)
                            ->get();

        return view(
            'product.detail',
            [
            'product'=>$raw_data,
            'page_title'=>$raw_data['product_name'],
            'related_products'=>$related_products,
            ]
        );
    }

    function searchProducts(Request $req) {
        $query = $req->input('query');
        $raw_data = Product::where('product_name', 'like', '%'.$query.'%')->get();

        $isDataEmpty = collect($raw_data)->isEmpty();

        if($isDataEmpty) $raw_data = null;

        return view(
            'product.search',
            ['products'=>$raw_data,
            'query'=>$query,
            'page_title'=>("Search result for '".$query."'")]
        );
    }

    function addProduct(Request $req) {
        $prod_name = $req->product_name;
        $prod_tag = $req->product_tag;
        $prod_desc = $req->product_description;
        $prod_price = $req->price;
        $prod_stock = $req->stock;

        $image = $req->file('image');
        $path = public_path('img');
        $extension = $image->getClientOriginalExtension();
        $imageName = time().'.'.$extension;
        $image->move('img', $imageName);

        $addProduct = new Product();

        $addProduct->product_name = $prod_name;
        $addProduct->product_tag = $prod_tag;
        $addProduct->product_description = $prod_desc;
        $addProduct->price = $prod_price;
        $addProduct->stock = $prod_stock;
        $addProduct->img_path = "img/".$imageName;
        $addProduct->sold = 0;
        $addProduct->sold_today = 0;

        $addProduct->save();

        return redirect()->back();
    }

    function removeProduct(Request $req) {
        $img_path = Product::where('id', $req->id)->get('img_path');
        $img_path = $img_path[0]->img_path;

        File::delete(public_path($img_path));

        Product::where('id', $req->id)->delete();
    
        return redirect()->back();
    }

    function editProduct(Request $req) {
        $product = Product::find($req->product_id);
    
        $product->product_name = $req->product_name;
        $product->product_tag = $req->product_tag;
        $product->product_description = $req->product_description;
        $product->price = $req->price;
        $product->stock = $product->stock+$req->new_stock;
    
        $product->save();
    
        return redirect()->back();
    }
}