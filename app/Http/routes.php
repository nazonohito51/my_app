<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/login', 'Auth\AuthController@getLogin')->name('auth.get_login');
Route::post('auth/login', 'Auth\AuthController@postLogin')->name('auth.post_login');
Route::get('auth/logout', 'Auth\AuthController@getLogout')->name('auth.get_logout');
Route::get('auth/register', 'Auth\AuthController@getRegister')->name('auth.get_register');
Route::post('auth/register', 'Auth\AuthController@postRegister')->name('auth.post_register');

Route::resource('tweet', 'TweetController');

Route::get('user/{user}/profile', 'UserProfileController@show')->name('user_profile.show');
Route::get('user/{user}/profile/edit', 'UserProfileController@edit')->name('user_profile.edit');
Route::match(['put', 'patch'], 'user/{user}/profile', 'UserProfileController@update')->name('user_profile.update');
