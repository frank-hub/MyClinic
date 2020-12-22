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
Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'UserController@login');
    Route::get('/logout', 'UserController@logout')->middleware('auth:api');
    Route::post('register', 'UserController@register');
    Route::post('book', 'ApiBookController@book');
    Route::get('all_bookings', 'ApiBookController@bookings');
    Route::get('all_chats', 'ChatController@show');
    Route::post('chat_store', 'ChatController@chat');


});


// Booking Api
Route::post('book', 'ApiBookController@book');
Route::delete('destroy/{id}', 'ApiBookController@destroy');

Route::get('test/{id}', 'UserController@find');
Route::get('test', 'UserController@test');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'UserController@details');
    });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
