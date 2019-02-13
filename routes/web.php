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
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/services', function () {
    return view('services');
});
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('dashboard','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/patients', 'PatientsController@index')->name('admin.patient');
    Route::get('/add_patient', function () {
        return view('admin/patient/add');
    });

    Route::get('/current_staff','StaffsController@index')->name('admin.staff.current');
    Route::get('/add_staff',function(){
        return view('admin/staff/add_staff');
    });

    Route::get('/current_bookings','BookingsController@index')->name('admin.booking.current');
    Route::get('/patient_pdf','PatientsController@viewPDF')->name('pdf');
});

Route::get('alert/{AlertType}','sweetalertController@alert')->name('alert');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('patients', 'PatientsController');
Route::resource('staff', 'StaffsController');
Route::resource('bookings', 'BookingsController');