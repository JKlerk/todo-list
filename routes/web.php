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
Route::get('/profile', 'HomeController@profile');
Route::get('/createlist', 'HomeController@createList');
Route::get('/createtask', 'HomeController@createTask');

Route::get('/editlist/{id}', 'HomeController@editList');
Route::get('/edittask/{id}', 'HomeController@editTask');

Route::get('/deletelist/{id}', 'HomeController@deleteList');
Route::get('/deletetask/{id}', 'HomeController@deleteTask');
Route::get('/deleteuser', 'HomeController@deleteUser');

Route::get('/logout', function () {
	\Auth::logout();
	return redirect()->route('login');
});

Route::post('/createlist', 'HomeController@postList');
Route::post('/createtask', 'HomeController@postTask');

Route::post('/editlist/{id}', 'HomeController@postEditList');
Route::post('/edittask/{id}', 'HomeController@postEditTask');

Route::get('/list/{id}/name', 'HomeController@getSpecificTasksName');
Route::get('/list/{id}/status', 'HomeController@getSpecificTasksStatus');

Route::post('/password/change', 'HomeController@changePassword')->name('password.update');

Route::post('/changecolor', 'HomeController@changeColor');
Route::post('/changestatus/{id}', 'HomeController@changeStatus');



