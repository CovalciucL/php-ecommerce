<?php
$router->map('GET','/public/admin','App\Controllers\Admin\DashboardController@show','admin_dashboard');
$router->map('GET','/public/admin/charts','App\Controllers\Admin\DashboardController@getChartData','admin_dashboad_charts');

//category managment
$router->map('GET','/public/admin/product/categories',
'App\Controllers\Admin\ProductCategoryController@show','product_category');
$router->map('POST','/public/admin/product/categories',
'App\Controllers\Admin\ProductCategoryController@store','create_product_category');

$router->map('POST','/public/admin/product/categories/[i:id]/edit',
'App\Controllers\Admin\ProductCategoryController@edit','edit_product_category');

$router->map('POST','/public/admin/product/categories/[i:id]/delete',
'App\Controllers\Admin\ProductCategoryController@delete','delete_product_category');

//subcategory
$router->map('POST','/public/admin/product/subcategory/create',
'App\Controllers\Admin\SubCategoryController@store','create_subcategory');
$router->map('POST','/public/admin/product/subcategory/[i:id]/edit',
'App\Controllers\Admin\SubCategoryController@edit','edit_subcategory');

$router->map('POST','/public/admin/product/subcategory/[i:id]/delete',
'App\Controllers\Admin\SubCategoryController@delete','delete_subcategory');

//Product

$router->map('GET','/public/admin/category/[i:id]/selected',
'App\Controllers\Admin\ProductController@getSubcategories','selected_category');

$router->map('GET','/public/admin/product/create',
'App\Controllers\Admin\ProductController@showProductForm','create_product_form');
$router->map('POST','/public/admin/product/create',
'App\Controllers\Admin\ProductController@store','create_product');


$router->map('GET','/public/admin/products',
'App\Controllers\Admin\ProductController@show','show_products');
$router->map('GET','/public/admin/product/[i:id]/edit',
'App\Controllers\Admin\ProductController@showEditProductForm','edit_product_form');
$router->map('POST','/public/admin/product/edit',
'App\Controllers\Admin\ProductController@edit','edit_product');
$router->map('POST','/public/admin/product/[i:id]/delete',
'App\Controllers\Admin\ProductController@delete','delete_product');

$router->map('GET', '/public/admin/orders',
'App\Controllers\Admin\OrderController@show', 'view_orders');
$router->map('GET', '/public/admin/payments',
'App\Controllers\Admin\PaymentController@show', 'view_payments');
$router->map('GET','/public/admin/users',
'App\Controllers\Admin\UserController@show', 'show_users');