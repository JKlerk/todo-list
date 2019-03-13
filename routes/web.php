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
Route::get('/createlist', 'HomeController@createList');
Route::get('/delete/{id}', 'HomeController@delete');
Route::get('/logout', function () {
	\Auth::logout();
	return redirect()->route('login');
});

Route::post('/createlist', 'HomeController@postList');


