<?php

$router->map('GET','/public/register','App\Controllers\AuthController@showRegisterForm','register');
$router->map('POST','/public/register','App\Controllers\AuthController@register','register_me');


$router->map('GET','/public/login','App\Controllers\AuthController@showLoginForm','login');
$router->map('POST','/public/login','App\Controllers\AuthController@login','log_me_in');
$router->map('GET','/public/logout','App\Controllers\AuthController@logout','logout');
