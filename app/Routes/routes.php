<?php


$router = new AltoRouter;

$router->map('GET','/public/','App\Controllers\IndexController@show','home');
$router->map('GET','/public/featured','App\Controllers\IndexController@featuredProducts','featured');
$router->map('GET','/public/get-products','App\Controllers\IndexController@getProducts','get_products');
$router->map('POST','/public/load-more','App\Controllers\IndexController@loadMoreProducts','load_more_product');

$router->map('GET','/public/product/[i:id]','App\Controllers\ProductController@show','product');
$router->map('GET','/public/product-details/[i:id]','App\Controllers\ProductController@get','product_details');

$router->map('GET', '/public/products', 'App\Controllers\ProductController@showAll', 'products');
$router->map('GET', '/public/products/category/[*:slug]?/[*:subcategory]?','App\Controllers\CategoryController@show', 'products_category');
$router->map('POST', '/public/products/category/load-more','App\Controllers\CategoryController@loadMoreProducts', 'load_more_products_cat'
);






require_once  __DIR__ . '/cart.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/admin_routes.php';