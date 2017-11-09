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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/ukm/{id}', 'HomeController@detailUkm')->name('ukm');
Route::get('/user', 'UserController@index')->name('user');
Route::get('/admin', 'AdminController@admin')->name('admin');
