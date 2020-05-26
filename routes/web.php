<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
// return view('welcome');
// });

Route::view('/', 'admin/pages/login');
Route::get('login', 'admin\LoginregisterController@index')->name('login');
Route::post('login_data', 'admin\LoginregisterController@login');
Route::get('signup', 'admin\LoginregisterController@careteuser');
Route::post('signup_data', 'admin\LoginregisterController@storeuser');
Route::get('logout', 'admin\LoginregisterController@logout');

// Route::get('userdetail', 'admin\LoginregisterController@userdetail');


// Route::view('dashboard', 'admin/pages/dashboard');
Route::get('dashboard', 'admin\DashboardController@index');
Route::get('product', 'admin\ProductContrller@index');
Route::get('product_list', 'admin\ProductContrller@productlist');
Route::post('product_data', 'admin\ProductContrller@saveproduct');
Route::post('deleteproduct/{id}', 'admin\ProductContrller@deleteproduct');
Route::post('getproduct/{id}', 'admin\ProductContrller@getproduct');
Route::post('editproduct/{id}', 'admin\ProductContrller@editproduct');
Route::post('saveproductimage', 'admin\ProductContrller@saveproductimage');
Route::post('delete_product_image/{id}', 'admin\ProductContrller@deleteproductimage');

Route::post('imageupload', 'admin\ProductContrller@saveimage');
Route::get('pending-orders', 'admin\PendingorderController@index');

Route::post('checkout_link', 'admin\ProductplugController@createlink');
Route::get('{code}', 'admin\ProductplugController@redirectlink');
Route::get('cart/{code}', 'admin\ProductplugController@cartlink');


// Route::view('checkout', 'front/pages/checkout');



Route::post('orderdata', 'front\OrderController@saveorderdetail');
Route::post('approveorder/{id}', 'admin\PendingorderController@approveorder');
Route::post('declineorder/{id}', 'admin\PendingorderController@declineorder');
Route::post('vieworderdetail/{id}', 'admin\PendingorderController@getorderdetail');

