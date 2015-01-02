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

Route::get('/', array( 'as' => 'home', function()
{
	return View::make('layouts.default');
}));

// Confide RESTful route
Route::get('users/confirm/{code}', 'UsersController@getConfirm');
Route::get('users/reset_password/{token}', 'UsersController@getReset');
Route::get('users/reset_password', 'UsersController@postReset');
Route::controller( 'users', 'UsersController');

Route::group(array('prefix' => 'api', 'before' => 'auth.token'), function() {
    Route::resource( 'posts', 'PostsController',
        array('except' => array('edit', 'create')));

    Route::get('auth', 'Tappleby\AuthToken\AuthTokenController@index');
    Route::post('auth', 'Tappleby\AuthToken\AuthTokenController@store');
    Route::delete('auth', 'Tappleby\AuthToken\AuthTokenController@destroy');
});
