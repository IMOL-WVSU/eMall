@extends('template.header')

@section('content')
    <?php $page_title = 'Password Reset'?>
    <div class="container w-50 bg-success p-3 text-white">
        <h1>Reset Password</h1>
        <br>
        <form action="/reset-password" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">
            <div class="input-group">
                <label for="email" class="w-25 my-auto border-none">Email Address</label>
                <input class="form-control w-50 rounded" type="email" name="email" id="" value="{{ request()->email }}">
            </div>
            {{-- <br>
            <div class="input-group">
                <label for="password" class="w-25 my-auto border-none">Password</label>
                <input class="form-control w-50 rounded" type="password" name="password" id="">
            </div> --}}
            <br>
            <div class="input-group">
                <label for="password" class="w-25 my-auto border-none">Password</label>
                <input class="form-control w-50 rounded" type="password" name="password" id="">
            </div>
            <br>
            <div class="input-group">
                <label for="password_confirmation" class="w-25 my-auto border-none">Retype Password</label>
                <input class="form-control w-50 rounded" type="password" name="password_confirmation" id="">
            </div>
            <br>
            <div class="text-end">
                <button type="submit" class="btn btn-warning align-end">Reset Password</button>
            </div>
        </form>
    </div>
@endsection