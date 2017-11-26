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
Route::get('/profile', 'HomeController@getProfile')->name('user');
Route::get('/profile/{id}', 'HomeController@getProfile');

Route::middleware(['auth'])->group(function () {
    Route::post('/user/change', 'ProfileController@setProfile');
    Route::post('/user/ukm', 'ProfileController@setUkm');
    
    Route::post('/admin/user/add', 'UserController@create');
    Route::post('/admin/user/{id}/edit', 'UserController@update');

    Route::post('/admin/ukm/add', 'UkmController@create');
    Route::post('/admin/ukm/{id}/edit', 'UkmController@update');
    
    Route::post('/admin/product/add', 'ProductController@create');
    Route::post('/admin/product/{id}/edit', 'ProductController@update');
    
    Route::post('/admin/image/add', 'ImageController@create');
    Route::post('/admin/image/{type}/{id}/edit', 'ImageController@description');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/user/{id}/delete', 'UserController@delete');
        Route::get('/admin/user/{id}/admin', 'UserController@setAdmin');
        Route::get('/admin/ukm/{id}/delete', 'UkmController@delete');
        Route::get('/admin/product/{id}/delete', 'ProductController@delete');
        Route::get('/admin/image/{type}/{id}/delete', 'ImageController@delete');
    });
});

Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/', 'AdminController@index');
    Route::get('/user', 'AdminController@user');
    Route::get('/ukm', 'AdminController@ukm');
    Route::get('/product', 'AdminController@product');
    Route::get('/image', 'AdminController@image');

    // Route::get('/user/{id}', 'AdminController@showUser');
    // Route::get('/ukm/{id}', 'AdminController@showUkm');
    // Route::get('/product/{id}', 'AdminController@showProduct');

    Route::get('/password', 'AdminController@password');
});

Route::prefix('ajax')->group(function () {
    Route::get('user', 'AjaxController@getUser');
    Route::get('category', 'AjaxController@getCategory');
    Route::get('ukm', 'AjaxController@getUkm');
    Route::get('product', 'AjaxController@getProduct');
});
