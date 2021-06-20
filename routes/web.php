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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/studio', 'StudioController@index');
Route::get('/studios/{studio}', 'StudioController@show');
Route::get('/calendar', 'CalendarController@calendar');
//Route::get('/reservation' , 'ReservationController@show')->name('reservation.show');
Route::post('/reservation/', "ReservationController@post")->name("reservation.post");
Route::get('/reservation/confirm', 'ReservationController@confirm')->name("reservation.confirm");
Route::post('/reservation/confirm', "ReservationController@send")->name("reservation.send");
//Route::middleware('auth')->get('api/reservation', 'ReservationController@send');
Route::get('/reservation/finish', 'ReservationController@finish')->name("reservation.finish");
Route::post('/reservations', 'ReservationController@store');
Route::get('/reservation/{room}', 'ReservationController@show');