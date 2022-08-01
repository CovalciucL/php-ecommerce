<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>

    <link rel="stylesheet" href="/css/all.css">
    <script src="https://kit.fontawesome.com/a7178e0ca6.js" crossorigin="anonymous"></script>
</head>
<body data-page-id="@yield('data-page-id')">
    @include('includes.admin-sidebar')
    <div class="off-canvas-content admin_title_bar" data-off-canvas-content>
        <div class="title-bar">
            <div class="title-bar-left">
              <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
              <span class="title-bar-title">{{getenv('APP_NAME')}}</span>
            </div>
          </div>
        @yield('content')
    </div>
    <script src="/js/all.js"></script>
    <script src="/js/ecommerce.js"></script>
</body>
</html>