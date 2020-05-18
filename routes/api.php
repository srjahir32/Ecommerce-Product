<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('logout', 'API\UserController@logout');
    Route::post('user_details', 'API\UserController@userdetails');
    Route::post('products', 'API\ProductController@index');
    Route::post('products/create', 'API\ProductController@create');
    Route::post('products/view', 'API\ProductController@view');
    Route::post('products/edit', 'API\ProductController@edit');
    Route::post('products/remove', 'API\ProductController@remove');
    Route::post('products/addimage', 'API\ProductController@addimage');
    Route::post('products/viewimage', 'API\ProductController@viewimage');
    Route::post('products/removeimage', 'API\ProductController@removeimage');
    Route::post('products/addoption', 'API\ProductController@addoption');
    Route::post('products/viewoption', 'API\ProductController@viewoption');
    Route::post('products/editoption', 'API\ProductController@editoption');
    Route::post('products/addvariation', 'API\ProductController@addvariation');
    Route::post('products/viewvariation', 'API\ProductController@viewvariation');
    Route::post('products/editvariation', 'API\ProductController@editvariation');
    Route::post('business/create', 'API\UserbusinessController@create');
    Route::post('business/view', 'API\UserbusinessController@view');
    Route::post('business/edit', 'API\UserbusinessController@edit');
    Route::post('order/create', 'API\CreateorderController@create');
    Route::get('order/view', 'API\CreateorderController@view');
});

