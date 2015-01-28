<?php

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


Route::get('/', array( 'as' => 'home',  'uses' => 'PostsController@index'));
Route::get('article/{slug}', 'PostsController@show');
Route::get('article/{year}/{month}', 'PostsController@indexByYearMonth');
Route::post('comments', array('before' => array('csrf','auth' ),
        'uses' => 'CommentsController@create'));

Route::get('author/{id}', 'UsersController@show');


Route::get('test', function () {
    return View::make('hello');
});