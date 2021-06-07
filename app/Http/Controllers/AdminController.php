<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    function registerSeller(Request $req) {
        if(Gate::denies('add-employee')) {
            return redirect('');
        }

        $password = Hash::make($req->password);

        $registerUser = new User();

        $registerUser->name = $req->name;
        $registerUser->username = $req->username;
        $registerUser->email = $req->email;
        $registerUser->password = $password;
        $registerUser->role = 1;

        $registerUser->save();

        return redirect('admin');
    }

    function viewAdmin() {
        if(Gate::denies('manage-products')) {
            return redirect('');
        }

        return view(
            'admin/admin',
            ['page_title'=>"Admin Controls"]
        );
    }

    function manageProduct() {
        if(Gate::denies('manage-products')) {
            return redirect('');
        }

        $raw_data = Product::simplePaginate(10);

        return view(
            'admin.manage-product',
            ['products'=> $raw_data,
            'page_title'=>"Manage Products"]);
    }
}
