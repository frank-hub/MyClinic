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
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

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
