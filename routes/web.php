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

Route::get('/', 'UsersController@index')->name('user');
Route::get('/user/getData', 'UsersController@show')->name('user');
Route::post('/user/store', 'UsersController@store');
// Route::prefix('/')->group(function () {
//     route::get('/', 'UsersController@index')->name('user');
// });
