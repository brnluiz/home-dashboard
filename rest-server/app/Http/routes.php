<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/{id}', 'UserController@showProfile');

Route::get('/history','HistoryController@index');
Route::get('/history/{id}','HistoryController@get');


Route::get('/devices','DeviceController@index');
Route::get('/devices/{id}','DeviceController@get');
Route::post('/devices','DeviceController@save'); 
Route::put('/devices/{id}','DeviceController@update');
Route::delete('/devices/{id}','DeviceController@delete');

Route::get('/devices/{id}/stats','DeviceController@stats'); 
