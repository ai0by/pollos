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

Route::get('/login','Admin\LoginController@login');
Route::get('/register','Admin\LoginController@register');
Route::post('/vlogin','Auth\LoginController@login');
Route::post('/vregister','Auth\LoginController@register');
Route::get('/indexone','Admin\IndexoneController@index');
Route::get('/loginout','Controller@loginOut');
