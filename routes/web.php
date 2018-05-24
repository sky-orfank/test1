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

Route::get('/weather', 'WeatherController@getWeather');
Route::get('/orders', 'OrderController@getorders');
Route::get('/order/{id}', 'OrderController@editOrder');
Route::post('/saveOrder/{id}', 'OrderController@saveOrder');