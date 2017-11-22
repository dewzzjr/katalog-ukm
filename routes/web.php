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
Route::get('/profile', 'UserController@index')->name('user');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/user', 'AdminController@user');
    Route::get('/ukm', 'AdminController@ukm');
    Route::get('/product', 'AdminController@product');

    Route::get('/user/{id}', 'AdminController@showUser');
    Route::get('/ukm/{id}', 'AdminController@showUkm');
    Route::get('/product/{id}', 'AdminController@showProduct');

    Route::get('/password', 'AdminController@password');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/admin/user/add', 'UserController@create');
    Route::post('/admin/user/{id}/edit', 'UserController@update');

    Route::post('/admin/ukm/add', 'UkmController@create');
    Route::post('/admin/ukm/{id}/edit', 'UkmController@update');
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/user/{id}/delete', 'UserController@delete');
        Route::get('/admin/ukm/{id}/delete', 'UkmController@delete');
    });
});

Route::prefix('ajax')->group(function () {
    Route::get('user', 'AjaxController@getUser');
    Route::get('category', 'AjaxController@getCategory');
});
