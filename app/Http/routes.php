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

Route::get('auth/register', 'Auth\AuthController@getRegister')->name('auth.get_register');
Route::post('auth/register', 'Auth\AuthController@postRegister')->name('auth.post_register');

Route::resource('tweet', 'TweetController');
