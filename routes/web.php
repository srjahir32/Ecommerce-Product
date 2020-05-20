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
// Route::view('signup', 'admin/pages/signup');
Route::get('signup', 'admin\LoginregisterController@careteuser');
Route::post('signup_data', 'admin\LoginregisterController@storeuser');
Route::get('logout', 'admin\LoginregisterController@logout');
Route::get('userdetail', 'admin\LoginregisterController@userdetail');


// Route::view('dashboard', 'admin/pages/dashboard');
Route::get('dashboard', 'admin\DashboardController@index');
Route::get('products', 'admin\ProductContrller@index');
Route::post('product_data', 'admin\ProductContrller@saveproduct');
Route::get('pending-orders', 'admin\PendingorderController@index');
