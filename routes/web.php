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

Route::get('/','HomeController@index');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

// Challanges
Route::get('Challenges','ChallengesController@show')->name('challenges.view');
// USERS
Route::resource('Users','UsersController');
// Teams
Route::get('Teams','TeamsController@index')->name('Teams');
Route::get('Teams/{Team}','TeamsController@show')->name('showTeam');
/*********************************************/
// Protected By [Auth] MiddleWare  ***********/
/*********************************************/
Route::group(['middleware' => 'auth:web'],function (){
  // USER
  Route::resource('User','UserController');
  // Challenges
  Route::post('Challenges','ChallengesController@slove')->name('challenges.slove');
  // Teams
  Route::resource('Team','TeamController');
  // Join Teams
  Route::get('joinTeam/{id}','ControlTeamController@join')->name('joinTeam');
  Route::get('leaveTeam','ControlTeamController@leave')->name('leaveTeam');
  // AdminRemoveUser
  Route::get('AdminapproveUser/{user}/{team}','ControlTeamController@approve')->name('Adminapprove');
  Route::get('AdminRemoveUser/{user}/{team}','ControlTeamController@removeuser')->name('AdminRemoveUser');
});
