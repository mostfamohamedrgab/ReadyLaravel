<?php


Route::get('Dashboard/Login','AdminAuthController@showForm')->name('admin.login');
Route::post('Dashboard/Login','AdminAuthController@Login')->name('admin.login');


Route::group([
              'prefix' => 'Dashboard',
              'as' => 'admin.',
              'middleware' => 'auth:admin',
            ], function (){

  // Defult Root Path 
  Route::view('/','admin.index');
  // Admins Controller
  Route::resource('Admins','AdminsController');	
  // users
  Route::resource('Users','UsersController');	
  // News
   Route::resource('News','NewsController');
   // Contacts
  Route::get('Contacts','ContactsController@index')->name('Contact');
  Route::delete('Contacts/{id}','ContactsController@destroy')->name('Contact.destroy');
});
