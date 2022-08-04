@extends('layouts.app')
@section('title', 'Register Free Account')
@section('data-page-id', 'auth')

@section('content')
    <div class="auth" id="auth">
        <section class="register_form">
            <div class="container-sm">
                    <h2 class="text-center">
                        Create Account
                    </h2>
                    @include('includes.message')
                    <form action="/register" method="POST">
                        <div class="mb-3">
                            <input type="text" name="fullname" class="form-control" placeholder="Your Name" value="{{\App\Classes\Request::old('post','fullname')}}">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="email" class="form-control" placeholder="Your Email" value="{{\App\Classes\Request::old('post','email')}}">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Your Username" value="{{\App\Classes\Request::old('post','username')}}">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Your Password">
                        </div>
                        <div class="mb-3">
                            <textarea name="address"class="form-control" placeholder="Your address">{{\App\Classes\Request::old('post','address')}}</textarea>
                        </div>
                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::token()}}">
                    <button class="btn btn-primary float-end">Register</button>
                </form>
                <p>Already Registred? <a href="/login"> Login Here</a></p>
            </div>
        </section>
    </div>
@endsection