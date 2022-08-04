@extends('layouts.app')
@section('title', 'Login to Your Account')
@section('data-page-id', 'auth')

@section('content')
    <div class="auth" id="auth">
        <section class="login_form">
            <div class="container-sm">
                <h2 class="text-center">
                    Login
                </h2>
                @include('includes.message')
                <form action="/login" method="POST">
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Your Username or Email" value="{{\App\Classes\Request::old('post','username')}}">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Your Password">
                        </div>
                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::token()}}">
                    <button class="btn btn-primary float-end">Login</button>
                </form>
            <p>Don't have an account? <a href="/register">Register Here</a></p>
            </div>
        </section>
    </div>
@endsection