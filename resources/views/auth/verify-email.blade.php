@extends('template/header')

@section('content')
    <?php $page_title = 'Email Verification' ?>
    <div class="container">
        <h1>Verify Email</h1>
        <div class="container">
            <form action="{{ url('/') }}/email/verification-notification" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Send Verification Mail</button>
            </form>
        </div>
        @if (session('status') == 'verification-link-sent')
            <div class="container text-sucess">
                <h3>
                    The confirmatory email has been sent to {{ $email[0]->email }}.
                    Please check the spam if you haven't received it from the mail.
                </h3>
            </div>
        @endif
    </div>
@endsection