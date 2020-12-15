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

Route::prefix('v1')->group(function () {
    Route::post('/login', 'Api\UserController@login');
    Route::post('/register', 'Api\UserController@register');
    Route::post('/create_room', 'Api\RoomController@create_room');
    Route::get('/list_rooms', 'Api\RoomController@list_rooms');
    Route::post('/booking', 'Api\BookingController@booking');
    Route::post('/checkin', 'Api\BookingController@checkin');
});