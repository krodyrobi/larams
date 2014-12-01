<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', array('as' => 'home', function () {
	return View::make('home');
}));


Route::get('password/reset', array(
  'uses' => 'RemindersController@getRemind',
  'as' => 'password.remind'
));

Route::post('password/reset', array(
  'uses' => 'RemindersController@postRemind',
  'as' => 'password.request'
));

Route::get('password/reset/{token}', array(
  'uses' => 'RemindersController@getReset',
  'as' => 'password.reset'
));

Route::post('password/reset/{token}', array(
  'uses' => 'RemindersController@postReset',
  'as' => 'password.update'
));


Route::get('login', array('as' => 'login', 'uses' => 'UsersController@login'))->before('guest');
Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));
Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'UsersController@dashboard'))->before('auth');
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'))->before('auth');
Route::get('/register', array('as' => 'register', 'uses' => 'UsersController@create'))->before('guest');
Route::post('/register', array('as' => 'register', 'uses' => 'UsersController@store'))->before('guest');


Route::get('profile', array('as' => 'profile', function () {
	return View::make('profile');
}))->before('auth');
