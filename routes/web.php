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

Route::get('/', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home'); /* Alias */
Route::get('/home', function() { return redirect()->route('home'); }); /* Redirect */

Route::get('/location/search', 'LocationController@search')->name('location.search');
Route::get('/location/detail/{id}', 'LocationController@detail')->name('location.detail');

Route::get('/user/profile', 'UserController@profile')->name('user.profile')->middleware('auth');
Route::put('/user/profile', 'UserController@update')->name('user.update')->middleware('auth');