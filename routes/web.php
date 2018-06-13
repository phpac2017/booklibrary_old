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
    //return view('welcome');
	return view('welcome');
});

Route::get('google', function () {
    return view('googleAuth');
});

Route::resource('crud', 'CRUDController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('mylist', 'CRUDController@mylist');
Route::get('addToCatalogue/{id}', 'CRUDController@addToCatalogue');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');
Route::get('live_search', 'CRUDController@liveSearch');
Route::get('live_search/action', 'CRUDController@action')->name('live_search.action');   
