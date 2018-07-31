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
    return view('welcome');
});

Route::get('dashboard', function()
{
	return view('dashboard');
});

Route::get('users', 'UserController@getAllUsers');
Route::get('users/{id}','UserController@getUserById');
Route::get('edit-users/{id}','UserController@editUserById');
Route::post('update-users/{id}','UserController@updataUserById');
Route::get('delete-users/{id}','UserController@deleteUserById');
Route::get('recover-users/{id}','UserController@recoverUserById');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
