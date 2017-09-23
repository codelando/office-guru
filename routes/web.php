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


/**
 * get /resource -> list
 * get /resource/create -> new form
 * post /resource -> create new
 * get /resource/{id}/edit -> edit existing
 * get /resource/{id} -> show resource
 * patch /resource/{id} -> save existing
 * delete /resource/{id} -> delete existing
 */

Auth::routes();

Route::get('/', 'PageController@index')->name('page.home');
Route::get('/home', function() { return redirect()->route('page.home'); }); /* Redirect */
Route::get('/faq', 'PageController@faq')->name('page.faq');


Route::get('/location', 'LocationController@index')->name('location.index');

Route::post('/location', 'LocationController@store')->name('location.store');

Route::get('/location/create', 'LocationController@create')->name('location.create');

Route::get('/location/markers', 'LocationController@markers')->name('location.markers');

Route::get('/location/{location}', 'LocationController@show')->name('location.show');

Route::get('/location/{location}/edit', 'LocationController@edit')->name('location.edit');



Route::get('/user/profile', 'UserController@profile')->name('user.profile')->middleware('auth');
Route::put('/user/profile', 'UserController@update')->name('user.update')->middleware('auth');