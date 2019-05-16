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
Route::resource('cegek','CegekController')->middleware('auth');
Route::resource('nyomtatok','PrinterController')->middleware('auth');
Route::resource('szamlalo','PrinterCounterController')->middleware('auth');
Route::resource('javitasok','RepairCounterController')->middleware('auth');
Route::resource('alkatresz','PartsController')->middleware('auth');
Route::resource('hasznalt','UsedPartsController')->middleware('auth');