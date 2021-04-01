<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $profile->name }}</title>
</head>
<body>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <form action="home" method="get">
        @csrf
        <button type="submit">Home</button>
    </form>
    <form action="cart" method="get">
        @csrf
        <button type="submit">View Cart</button>
    </form>
    <form action="order" method="get">
        @csrf
        <button type="submit">Past Purchases</button>
    </form>

    <h1>Profile</h1>
    <form action="updateProfile" method="post">
        @csrf
        <label for="name">Account Name</label>
        <input name="name" value="{{ $profile->name }}">
        <br>
        <label for="email">Email</label>
        <input disabled name="email" value="{{ $profile->email }}">
        <br>
        <label for="username">Username</label>
        <input disabled name="username" value="{{ $profile->username }}">
        <br>
        <button type="submit">Update</button>
    </form>

    <h1>Address</h1>
    @if($address)
        <form action="updateAddress" method="post">
            @csrf
            <label for="address_name">Address Name</label>
            <input name="address_name" value="{{ $address[0]['address_name'] }}" />
            <br>
            <label for="street">Street</label>
            <input name="street" value="{{ $address[0]['street'] }}">
            <br>
            <label for="brgy">Barangay</label>
            <input name="brgy" value="{{ $address[0]['brgy'] }}">
            <br>
            <label for="municipality">Municipality</label>
            <input name="municipality" value="{{ $address[0]['municipality'] }}">
            <br>
            <label for="province">Province</label>
            <input name="province" value="{{ $address[0]['province'] }}">
            <br>
            <label for="zipCode">Zip Code</label>
            <input name="zipCode" value="{{ $address[0]['zipCode'] }}">
            <br>
            <label for="contact_number">Contact Number</label>
            <input name="contact_number" value="{{ $address[0]['contact_number'] }}">
            <br>
            <button type="submit">Update</button>
        </form>
        
    @else
        <form action="updateAddress" method="post">
            @csrf
            <label for="address_name">Address Name</label>
            <input name="address_name" />
            <br>
            <label for="street">Street</label>
            <input name="street" >
            <br>
            <label for="brgy">Barangay</label>
            <input name="brgy" >
            <br>
            <label for="municipality">Municipality</label>
            <input name="municipality" >
            <br>
            <label for="province">Province</label>
            <input name="province" >
            <br>
            <label for="zipCode">Zip Code</label>
            <input name="zipCode" >
            <br>
            <label for="contact_number">Contact Number</label>
            <input name="contact_number" >
            <br>
            <button type="submit">Update</button>
        </form>
    @endempty
    
</body>
</html>