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

Route::get('/', 'MainController@index');
Route::get('/dash', 'MainController@dash');
Route::get('/delete/{id}', 'MainController@delete');
Route::post('/result', 'MainController@post_url');
Auth::routes();

Route::get('/{shorten}','MainController@go_url');
Route::get('/home', 'HomeController@index')->name('home');
