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


/**
* Pricing Route
*/

//display
Route::get('/room-type-prices', 'ApiController@pricingIndex');

//display single
Route::get('/room-type-price/{id}', 'ApiController@pricingShow');

//insert
Route::post('/room-type-price', 'ApiController@pricingStore');

//update
Route::put('/room-type-price', 'ApiController@pricingStore');

//delete
Route::delete('/room-type-price/{id}', 'ApiController@pricingDestroy');


/**
* Booking Route
*/

//display
//Route::get('/bookings', 'ApiController@bookingIndex');

//display single
//Route::get('/booking/{id}', 'ApiController@bookingShow');

//insert
Route::post('/booking', 'ApiController@bookingStore');

//update
//Route::put('/booking', 'ApiController@bookingStore');

//delete
//Route::delete('/booking/{id}', 'ApiController@bookingDestroy');