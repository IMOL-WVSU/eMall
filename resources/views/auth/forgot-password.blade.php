@extends('template.header')

@section('content')
    <style>
        .vertical-center {align-items: center;} body {background: url("/img/reg-bg.png") no-repeat; background-size: cover;}
    </style>
    <?php $page_title = 'Forgot Password'?>
    <div class="container d-flex">
        <div class="container w-75"></div>
        <div class="h-100 w-75">
            <br><br><br><br><br>
            
            <div class="bg-success rounded p-3 text-light w-75 vertical-center shadow">
                <h1 class="mb-3 w-75">Reset Password</h1>
                <form action="forgot-password" method="post" class="w-100">
                    @csrf
                    <div class="input-group">
                        <label for="email" class="w-25 my-auto border-none">Email Address</label>
                        <input value=" " name="email" class="form-control w-50 rounded" type="email">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-warning mt-4">Send Password Reset Link</button>
                    </div>
                </form>
            </div>

            @if (session('status'))
                <div class="bg-success rounded shadow my-2 w-75 p-2 px-3 text-white">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-warning rounded shadow mt-2 w-75 p-2 px-3 text-black">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
        </div>
    </div>
@endsection