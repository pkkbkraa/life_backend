<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

	Route::resource('category', 'CategoryController');
	Route::resource('coupon', 'CouponController');
	Route::resource('promotion', 'PromotionController');
	Route::resource('order', 'OrderController');
	Route::resource('product', 'ProductController');
	Route::resource('user', 'UserController');
	Route::resource('vendor', 'VendorController');
	Route::resource('banner', 'BannerController');
    Route::resource('email-management', 'EmailManagementController');

});
