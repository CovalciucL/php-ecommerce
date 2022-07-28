@extends('layouts.app')
@section('title', 'Register Free Account')
@section('data-page-id', 'auth')

@section('content')
    <div class="auth" id="auth">
        <section class="register_form">
            <div class="grid-x align-center grid-padding-x">
                <div class="small-12 medium-7 medium-centered">
                    <h2 class="text-center">
                        Create Account
                    </h2>
                    @include('includes.message')
                    <form action="/register" method="POST">
                    <input type="text" name="fullname" placeholder="Your Name" value="{{\App\Classes\Request::old('post','fullname')}}">
                    <input type="text" name="email" placeholder="Your Email" value="{{\App\Classes\Request::old('post','email')}}">
                    <input type="text" name="username" placeholder="Your Username" value="{{\App\Classes\Request::old('post','username')}}">
                    <input type="password" name="password" placeholder="Your Password">
                    <textarea name="address" placeholder="Your Address">{{\App\Classes\Request::old('post','username')}}</textarea>
                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::token()}}">
                    <button class="button float-right">Register</button>
                </form>
                <p>Already Registred? <a href="/login"> Login Here</a></p>
                </div>
            </div>
        </section>
    </div>
@endsection