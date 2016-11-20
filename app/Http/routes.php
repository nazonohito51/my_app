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

Route::get('tweet', 'TweetController@index')->name('tweet_index');
Route::get('tweet/create', 'TweetController@create')->name('tweet_create');
Route::post('tweet', 'TweetController@store')->name('tweet_store');
Route::get('tweet/{id}', 'TweetController@show')->name('tweet_show');
Route::get('tweet/{id}/edit', 'TweetController@edit')->name('tweet_edit');
