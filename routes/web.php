<?php

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
//     return view('welcome');
// });

Auth::routes();

/**
* Home
**/
//Route::get('/home', 'HomeController@index')->name('home');

/**
* Hotel Details (Display)
**/
Route::get('/', 'PagesController@HotelDetails');

/**
* Hotel Details (Edit hotel)
**/
 Route::get('/edit-hotel-details/{id}', 'PagesController@EditHotelDetails');

/**
* Hotel Details (Update hotel)
**/
 Route::post('/update-hotel-details/{id}', 'CrudController@UpdateHotelDetails');



/**
* Room Manager (Display)
**/
Route::get('/room-manager', 'PagesController@RoomManager');

/**
* Room Manager (Add new room)
**/
Route::get('/new-room', 'PagesController@AddRoom');

/**
* Room Manager (Save new room)
**/
Route::post('/save-new-room', 'CrudController@SaveRoom');

/**
* Room Manager (Edit room)
**/
 Route::get('/edit-room/{id}', 'PagesController@EditRoom');

/**
* Room Manager (Update room)
**/
 Route::post('/update-room/{id}', 'CrudController@UpdateRoom');

/**
* Room Manager (Delete room)
**/
 Route::get('/delete-room/{id}', 'PagesController@DeleteRoom');

/**
* Room Manager (Deleting room)
**/
 Route::post('/deleting-room/{id}', 'CrudController@DeletingRoom');



/**
* Room Type Manager (Display)
**/
Route::get('/room-type-manager', 'PagesController@RoomTypeManager');

/**
* Room Type Manager (Add new room)
**/
Route::get('/new-room-type', 'PagesController@AddRoomType');

/**
* Room Type Manager (Save room type)
**/
Route::post('/save-new-room-type', 'CrudController@SaveRoomType');

/**
* Room Type Manager (Add new room)
**/
Route::get('/edit-room-type/{id}', 'PagesController@EditRoomType');

/**
* Room Type Manager (Update room type)
**/
Route::post('/update-room-type/{id}', 'CrudController@UpdateRoomType');

/**
* Room Type Manager (Delete room)
**/
Route::get('/delete-room-type/{id}', 'PagesController@DeleteRoomType');

/**
* Room Type Manager (Deleting room)
**/
 Route::post('/deleting-room-type/{id}', 'CrudController@DeletingRoomType');



/**
* Price List Manager
**/
Route::get('/price-list-manager', 'PagesController@PriceListManager');

/**
* Price List Manager (Add new price)
**/
Route::get('/new-room-type-price', 'PagesController@AddRoomTypePrice');

/**
* Price List Manager (Ajax request)
**/
Route::get('/search-for-hotel/{id}', 'AjaxController@SearchHotel');

/**
* Price List Manager (Save room price)
**/
Route::post('/save-new-room-type-price', 'CrudController@SaveRoomTypePrice');

/**
* Price List Manager (Edit room price)
**/
Route::get('/edit-room-type-price/{id}', 'PagesController@EditRoomTypePrice');

/**
* Price List Manager (Update room type)
**/
Route::post('/update-room-type-price/{id}', 'CrudController@UpdateRoomTypePrice');

/**
* Price List Manager (Delete room type)
**/
Route::get('/delete-room-type-price/{id}', 'PagesController@DeleteRoomTypePrice');

/**
* Price List Manager (Deleting room type)
**/
 Route::post('/deleting-room-type-price/{id}', 'CrudController@DeletingRoomTypePrice');




/**
* Booking Manager
**/
Route::get('/booking-manager', 'PagesController@BookingManager');

/**
* Booking Manager (Add new book)
**/
Route::get('/new-book', 'PagesController@AddBookingManager');

/**
* Booking Manager (Add new book)
**/
Route::post('/save-new-book', 'CrudController@SaveBookingManager');

/**
* Booking Manager (Edit room book)
**/
Route::get('/edit-book/{id}', 'PagesController@EditBookingManager');

/**
* Booking Manager (Update room type)
**/
Route::post('/update-book/{id}', 'CrudController@UpdateBookingManager');

/**
* Booking Manager (delete room type)
**/
Route::get('/delete-book/{id}', 'PagesController@DeleteBookingManager');

/**
* Booking Manager (deleting room type)
**/
Route::post('/deleting-book/{id}', 'CrudController@DeletingBookingManager');

/**
* Booking Manager (Ajax request)
**/
Route::get('/reservations', 'AjaxController@ShowReservations');