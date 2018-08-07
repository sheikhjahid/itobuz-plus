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



Route::get('login',function()
{
	return view('auth.login');
});

Route::get('recover-password','Auth\LoginController@recoveryForm');
Route::post('recover','Auth\LoginController@recoverPassword');

Route::group(['middleware'=>'auth'], function()
{
Route::get('dashboard', function(){return view('dashboard');});
Route::get('create-user-form','UserController@createForm');
Route::post('create-user','UserController@createUser');
Route::get('users', 'UserController@getAllUsers');
Route::get('users/{id}','UserController@getUserById');
Route::get('edit-users/{id}','UserController@editUserById');
Route::post('update-users/{id}','UserController@updataUserById');
Route::get('delete-users/{id}','UserController@deleteUserById');
Route::get('recover-users/{id}','UserController@recoverUserById');
Route::post('search-users','UserController@searchUser');
Route::post('uploadPicture','UserController@uploadImage');
Route::get('profile','UserController@userProfile');

Route::get('create-team-form','TeamController@createForm');
Route::post('create-teams','TeamController@createTeam');
Route::get('teams','TeamController@getAllTeams');
Route::get('teams/{id}','TeamController@getTeamById');
Route::get('edit-teams/{id}','TeamController@editTeamById');
Route::post('update-teams/{id}','TeamController@updateTeamById');
Route::get('delete-teams/{id}','TeamController@deleteTeamById');
Route::get('recover-teams/{id}','TeamController@recoverTeamById');
Route::post('search-team-user','TeamController@searchAssociatedUser');
Route::get('logout','Auth\LoginController@logout');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
