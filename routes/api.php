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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->namespace('Api')->group(function() {
    // Auth routes
    Route::post('login', 'Auth\AuthController@login');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::get('products', 'ProductController@getProducts')->name('products');
    Route::get('products/{id}', 'ProductController@getSingle')->name('products.single');
    Route::post('orders', 'OrderController@storeOrder')->name('orders');

    // Only authenticated users routes
    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', 'Auth\AuthController@logout');
    });
});
