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

Route::get('/', 'PageController@index')->name('page.home');
Route::get('/home', function() { return redirect()->route('page.home'); }); /* Redirect */
Route::get('/faq', 'PageController@faq')->name('page.faq');

Route::get('/location/search', 'LocationController@search')->name('location.search');
Route::get('/location/markers', 'LocationController@markers')->name('location.markers');
Route::get('/location/detail/{location}', 'LocationController@detail')->name('location.detail');

Route::get('/user/profile', 'UserController@profile')->name('user.profile')->middleware('auth');
Route::put('/user/profile', 'UserController@update')->name('user.update')->middleware('auth');

