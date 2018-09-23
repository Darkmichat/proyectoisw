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
    return view('auth/login');
});
Route::resource('proyecto/conductor','ConductorController');
Route::resource('proyecto/vehiculo','VehiculoController');
Route::resource('proyecto/neumatico','NeumaticoController');
Route::resource('proyecto/asignado','AsignadoController');
Route::resource('proyecto/posee','PoseeController');
Route::resource('proyecto/registra','RegistraController');
Route::auth();

Route::get('/home', 'HomeController@index');

