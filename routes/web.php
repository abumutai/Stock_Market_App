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
Route::get('/purchase/{id}','ViewController@purchase')->name('purchase');

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::resource('shares','ShareController');

Route::resource('orders','OrderController');
Route::get('/confirm/{id}','ShareController@confirm')->name('confirm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('notifications','NotificationsController');



