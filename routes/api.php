<?php

use Illuminate\Http\Request;

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

//SELLERS
Route::get( 'sellers', 'SellersControler@index' );
Route::get( 'sellers/{seller}', 'SellersControler@show' );
Route::post( 'sellers', 'SellersControler@store' );
Route::put( 'sellers/{seller}', 'SellersControler@update' );
Route::patch( 'sellers/{seller}', 'SellersControler@update' );
Route::delete( 'sellers/{seller}', 'SellersControler@destroy' );
Route::post( 'addresses', 'AddressesController@store' );
Route::post( 'sellers/{seller}/addresses', 'SellersControler@attach' );
Route::put( 'sellers/{seller}/addresses', 'SellersControler@updateAddress' );

//PRODUCTS
Route::get( 'products', 'ProductsController@index' );
Route::get( 'products/{product}', 'ProductsController@show' );
Route::post( 'products', 'ProductsController@store' );
Route::put( 'products/{product}', 'ProductsController@update' );
Route::patch( 'products/{product}', 'ProductsController@update' );
Route::post( 'products/{product}/reviews', 'ReviewsController@store' );
Route::get( 'products/{product}/reviews', 'ReviewsController@show' );
Route::delete( 'products/{product}/reviews/{review}', 'ReviewsController@destroy' );
Route::delete( 'products/{product}', 'ProductsController@destroy' );



