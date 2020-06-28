<?php


Route::get('Dashboard/Login','AdminAuthController@showForm')->name('admin.login');
Route::post('Dashboard/Login','AdminAuthController@Login')->name('admin.login');


Route::group([
              'prefix' => 'Dashboard',
              'as' => 'admin.',
              'middleware' => 'auth:admin',
            ], function (){

  // Defult Root Path
  Route::get('/','DashboardController@index');
  // Admins Controller
  Route::resource('Admins','AdminsController');
  // users
  Route::resource('Users','UsersController');
  // Teams
  Route::resource('Teams','TeamsController');
  Route::get('Team/Remove/{user}/{team}','TeamsController@remove')->name('team.remove');
  Route::get('Team/Approve/{user}/{team}','TeamsController@approve')->name('team.approve');
  // Sections => Model [Cat]
  Route::resource('Sections','CatController');
  // Challenges
  Route::resource('Challenges','ChallengesController');
  // Pages
   Route::resource('Pages','PagesController');
   // News
   Route::resource('News','NewsController');
   // Contacts
  Route::get('Contacts','ContactsController@index')->name('Contact');
  Route::delete('Contacts/{id}','ContactsController@destroy')->name('Contact.destroy');
});
