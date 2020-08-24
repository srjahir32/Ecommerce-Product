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
Route::get('forgetpassword', 'admin\LoginregisterController@forgetpassword');
Route::post('forgetpassword_data', 'admin\LoginregisterController@createpasswordlink');
Route::get('resetpassword/{token}', 'admin\LoginregisterController@resetpassword');
Route::post('resetpassword_data', 'admin\LoginregisterController@updatepassword');
Route::get('logout', 'admin\LoginregisterController@logout');
Route::post('edituserprofile', 'admin\LoginregisterController@edituserprofile');
Route::get('userdetail', 'admin\LoginregisterController@userdetail');


// Route::view('dashboard', 'admin/pages/dashboard');
Route::get('dashboard', 'admin\DashboardController@index');
Route::post('bussiness_data', 'admin\DashboardController@savebussinesssetting');
Route::post('getdashboarddata/{id}', 'admin\DashboardController@getdashboarddata');

Route::post('get_bussiness_data', 'admin\DashboardController@viewbussinesssetting');
Route::post('edit_bussiness_data', 'admin\DashboardController@editbussinesssetting');

Route::get('product', 'admin\ProductController@index');
Route::get('product_list', 'admin\ProductController@productlist');
Route::post('product_data', 'admin\ProductController@saveproduct');
Route::post('deleteproduct/{id}', 'admin\ProductController@deleteproduct');
Route::post('getproduct/{id}', 'admin\ProductController@getproduct');
Route::post('editproduct/{id}', 'admin\ProductController@editproduct');
Route::post('saveproductimage', 'admin\ProductController@saveproductimage');
Route::post('delete_product_image/{id}', 'admin\ProductController@deleteproductimage');
Route::get('l/{link}', 'admin\Checkoutlinkcontroller@productlink');
Route::get('cart/{link}', 'admin\Checkoutlinkcontroller@productlinkdata');
Route::post('imageupload', 'admin\ProductController@saveimage');
Route::post('product_serach_data', 'admin\ProductController@getserachproduct');
Route::post('getvariationtable/{id}', 'admin\ProductController@getvariationtable');


Route::get('pending-orders', 'admin\PendingorderController@index');
Route::get('ordercount', 'admin\PendingorderController@ordercount');
Route::post('approveorder/{id}', 'admin\PendingorderController@approveorder');
Route::post('declineorder/{id}', 'admin\PendingorderController@declineorder');
Route::post('paidorder/{id}', 'admin\PendingorderController@paideorder');
Route::post('vieworderdetail/{id}', 'admin\PendingorderController@getorderdetail');
Route::post('removeorder/{id}', 'admin\PendingorderController@removeorder');

Route::get('invoices', 'admin\InvoiceController@invoices');
Route::get('allinvoices', 'admin\InvoiceController@index');
Route::get('paidinvoices', 'admin\InvoiceController@index');
Route::get('unpaidinvoices', 'admin\InvoiceController@index');
Route::get('paidinvoiceslict', 'admin\InvoiceController@paidinvoiceslict');
Route::get('generate_invoice/{id}','admin\PendingorderController@generateinvoice');


Route::post('checkout_link', 'admin\ProductplugController@createlink');
// Route::get('{code}', 'admin\ProductplugController@redirectlink');
// Route::get('cart/{code}', 'admin\ProductplugController@cartlink');

Route::post('orderdata', 'front\OrderController@saveorderdetail');


Route::get('paymentgetway', 'admin\PaymentgetwayController@index');
Route::post('merchant_data', 'admin\PaymentgetwayController@savemerchant');


Route::get('customer', 'admin\Customercontroller@index');
Route::post('customer_serach_data', 'admin\Customercontroller@getserachcustomer');
Route::post('customerdelete/{id}', 'admin\Customercontroller@customerdelete');

Route::get('orders', 'admin\OrderController@index');


