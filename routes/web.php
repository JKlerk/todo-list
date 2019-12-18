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

/*
|--------------------------------------------------------------------------
| List Routes
|--------------------------------------------------------------------------
|
| All routes for lists
| 
*/

Route::get('/', 'PageController@index')->name('home');
Route::get('/createlist', 'ListController@createList');
Route::get('/editlist/{id}', 'ListController@editList');
Route::get('/deletelist/{id}', 'ListController@deleteList');

Route::post('/createlist', 'ListController@postList');
Route::post('/editlist/{id}', 'ListController@postEditList');


/*
|--------------------------------------------------------------------------
| Task Routes
|--------------------------------------------------------------------------
|
| All routes for tasks
| 
*/

Route::get('/list/{id}/name', 'TaskController@getSpecificTasksName');
Route::get('/list/{id}/status', 'TaskController@getSpecificTasksStatus');
Route::get('/deletetask/{id}', 'TaskController@deleteTask');
Route::get('/edittask/{id}', 'TaskController@editTask');
Route::get('/createtask', 'TaskController@createTask');

Route::post('/createtask', 'TaskController@postTask');
Route::post('/edittask/{id}', 'TaskController@postEditTask');
Route::post('/changestatus/{id}', 'TaskController@changeStatus');


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| All routes for the user
| 
*/

Route::get('/profile', 'UserController@profile');
Route::get('/deleteuser', 'UserController@deleteUser');
Route::get('/logout', function () {
	\Auth::logout();
	return redirect()->route('login');
});

Route::post('/changecolor', 'UserController@changeColor');
Route::post('/password/change', 'UserController@changePassword')->name('password.update');