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
    Route::post('details', 'API\UserController@details');
    Route::post('products', 'API\ProductController@index');
    Route::post('products/create', 'API\ProductController@create');
    Route::post('products/view', 'API\ProductController@view');
    Route::post('products/edit', 'API\ProductController@edit');
    Route::post('products/remove', 'API\ProductController@remove');
    Route::post('products/addimage', 'API\ProductController@addimage');
    Route::post('products/viewimage', 'API\ProductController@viewimage');
    Route::post('products/removeimage', 'API\ProductController@removeimage');
});

