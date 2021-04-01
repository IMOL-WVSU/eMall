<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AddressOfUser;

class UserController extends Controller
{
    function getProfile() {
        $raw_data = User::find(Auth::id());
        $raw_address = $this->getShippingAddress();

        return view('profile', ['profile'=>$raw_data, 'address'=>$raw_address]);
    }

    function getShippingAddress() {
        $raw_data = AddressOfUser::where('user_id', Auth::id())->get();

        $isDataEmpty = collect($raw_data)->isEmpty();

        if($isDataEmpty) return null;

        return $raw_data;
    }

    function updateProfile(Request $req) {
        $profile = User::find(Auth::id());

        $profile->name = $req->name;

        $profile->save();

        return redirect('profile');
    }

    function updateAddress(Request $req) {
        $address = AddressOfUser::where('user_id', Auth::id())->take(1)->get();

        $isDataEmpty = collect($address)->isEmpty();

        if($isDataEmpty) {
            $address_reg = new AddressOfUser();

            $address_reg->user_id = Auth::id();
            $address_reg->address_name = $req->address_name;
            $address_reg->street = $req->street;
            $address_reg->brgy = $req->brgy;
            $address_reg->municipality = $req->municipality;
            $address_reg->province = $req->province;
            $address_reg->zipCode = $req->zipCode;
            $address_reg->contact_number = $req->contact_number;

            $address_reg->save();
        } else {
            $address_update = AddressOfUser::find($address[0]->id);

            $address_update->address_name = $req->address_name;
            $address_update->street = $req->street;
            $address_update->brgy = $req->brgy;
            $address_update->municipality = $req->municipality;
            $address_update->province = $req->province;
            $address_update->zipCode = $req->zipCode;
            $address_update->contact_number = $req->contact_number;

            $address_update->save();
        }

        return redirect('profile');
    }
}
