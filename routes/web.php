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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/location/search', 'LocationController@search')->name('location.search');

Route::get('/user/profile', 'UserController@profile')->name('user.profile')->middleware('auth');
Route::put('/user/profile', 'UserController@update')->name('user.update')->middleware('auth');