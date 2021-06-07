@extends('template/header')

@section('content')
    
<div class="container w-50">
    <h1>Profile</h1>
    <form action="updateProfile" method="post" class="mt-4">
        @csrf
        <div class="input-group">
            <label for="name" class="w-25 my-auto border-none">Account Name</label>
            <input name="name" value="{{ $profile->name }}" class="form-control w-50 rounded">
        </div>
        <br>
        <div class="input-group">
            <label for="name" class="w-25 my-auto border-none" for="email">Email</label>
            <input disabled name="email" value="{{ $profile->email }}" class="form-control w-50 rounded">
        </div>
        <br>
        <div class="input-group">
            <label for="username" class="w-25 my-auto border-none" >Username</label>
            <input disabled name="username" value="{{ $profile->username }}" class="form-control w-50 rounded">
        </div>
        <br>
        <button type="submit" class="float-end btn btn-outline-success">Update</button>
    </form>
</div>
<br><br>
<div class="container w-50 mb-5 pb-4">
    <h1>Address</h1>
    @if($address)
        <form action="updateAddress" method="post" class="mt-4">
            @csrf
            <div class="input-group">
                <label class="w-25 my-auto border-none" for="address_name">Address Name</label>
                <input name="address_name" value="{{ $address[0]['address_name'] }}" class="form-control w-50 rounded">
            </div>
            <br>
            <div class="input-group">
                <label class="w-25 my-auto border-none" for="street">Street</label>
                <input class="form-control w-50 rounded" name="street" value="{{ $address[0]['street'] }}">
            </div>
            <br>
            <div class="input-group">
                <label class="w-25 my-auto border-none" for="brgy">Barangay</label>
                <input class="form-control w-50 rounded" name="brgy" value="{{ $address[0]['brgy'] }}">
            </div>
            <br>
            <div class="input-group">
                <label class="w-25 my-auto border-none" for="municipality">Municipality</label>
                <input class="form-control w-50 rounded" name="municipality" value="{{ $address[0]['municipality'] }}">
            </div>
            <br>
            <div class="input-group">
                <label class="w-25 my-auto border-none" for="province">Province</label>
                <input class="form-control w-50 rounded" name="province" value="{{ $address[0]['province'] }}">
            </div>
            <br>
            <div class="input-group">
                <label class="w-25 my-auto border-none" for="zipCode">Zip Code</label>
                <input class="form-control w-50 rounded" name="zipCode" value="{{ $address[0]['zipCode'] }}">
            </div>
            <br>
            <div class="input-group">
                <label class="w-25 my-auto border-none" for="contact_number">Contact Number</label>
                <input class="form-control w-50 rounded" name="contact_number" value="{{ $address[0]['contact_number'] }}">
            </div>
            <br>
            <button type="submit" class="float-end btn btn-outline-success">Update</button>
        </form>
    @else
        <form action="updateAddress" method="post" class="mt-4">
            @csrf
            <div class="input-group">
                <label for="address_name" class="w-25 my-auto border-none">Address Name</label>
                <input value=" " name="address_name" class="form-control w-50 rounded">
            </div>
            <br>
            <div class="input-group">
                <label for="street" class="w-25 my-auto border-none">Street</label>
                <input class="form-control w-50 rounded" value=" " name="street" >
            </div>
            <br>
            <div class="input-group">
                <label for="brgy" class="w-25 my-auto border-none">Barangay</label>
                <input class="form-control w-50 rounded" value=" " name="brgy" >
            </div>
            <br>
            <div class="input-group">
                <label class="w-25 my-auto border-none" for="municipality">Municipality</label>
                <input class="form-control w-50 rounded" value=" " name="municipality" >
            </div>
            <br>
            <div class="input-group">
                <label class="w-25 my-auto border-none" for="province">Province</label>
                <input class="form-control w-50 rounded" value=" " name="province" >
            </div>
            <br>
            <div class="input-group">
                <label class="w-25 my-auto border-none" for="zipCode">Zip Code</label>
                <input class="form-control w-50 rounded" value=" " name="zipCode" >
            </div>
            <br>
            <div class="input-group">
                <label class="w-25 my-auto border-none" for="contact_number">Contact Number</label>
                <input class="form-control w-50 rounded" value=" " name="contact_number" >
            </div>
            <br>
            <button type="submit" class="float-end btn btn-outline-success">Update</button>
        </form>
    @endempty
</div>
@endsection