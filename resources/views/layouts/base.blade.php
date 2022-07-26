<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store - @yield('title')</title>

    <link rel="stylesheet" href="/public/css/all.css">
    <script src="https://kit.fontawesome.com/a7178e0ca6.js" crossorigin="anonymous"></script>
</head>
<body data-page-id="@yield('data-page-id')">
    @yield('body')
    <script src="/public/js/all.js"></script>
    @yield('stripe-checkout')
    @yield('paypal-checkout')
</body>
</html>