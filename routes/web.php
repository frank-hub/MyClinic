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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('dashboard','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/patients', 'PatientConteoller@index')->name('admin.patient');
    Route::get('/add_patient', function () {
        return view('admin/patient/add');
    });

    Route::get('/current_staff','StaffsController@index')->name('admin.staff.current');
    Route::get('/add_staff',function(){
        return view('admin/staff/add_staff');
    });
});



Route::get('/home', 'HomeController@index')->name('home');

Route::resource('patients', 'PatientsController');
Route::resource('staff', 'StaffsController');