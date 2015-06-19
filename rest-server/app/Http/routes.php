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

$app->get('/', function() use ($app) {
    return $app->welcome();
});

$app->get('/devices','App\Http\Controllers\DeviceController@index');
$app->post('/devices','App\Http\Controllers\DeviceController@save');
 
$app->get('/devices/{id}','App\Http\Controllers\DeviceController@get');
$app->put('/devices/{id}','App\Http\Controllers\DeviceController@update');
$app->delete('/devices/{id}','App\Http\Controllers\DeviceController@delete');

$app->get('/devices/{id}/stats','App\Http\Controllers\DeviceController@stats'); 


// { connection: 'tcp', ip: '192.168.1.3', port: '80' }