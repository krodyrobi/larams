<?php


Route::get('/', array( 'as' => 'home', 'before' => 'auth', function() {
	return View::make('layouts.default');
}));


Route::get('/','AllPostsController@index');

Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');

Route::get('article/{id}', 'PostController@show');


Route::get('test', function() {
    return View::make('hello');
});