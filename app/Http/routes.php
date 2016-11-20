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

Route::get('tweet', 'TweetController@index')->name('tweet.index');
Route::get('tweet/create', 'TweetController@create')->name('tweet.create');
Route::post('tweet', 'TweetController@store')->name('tweet.store');
Route::get('tweet/{id}', 'TweetController@show')->name('tweet.show');
Route::get('tweet/{id}/edit', 'TweetController@edit')->name('tweet.edit');
Route::match(['put', 'patch'], 'tweet/{id}/edit', 'TweetController@update')->name('tweet.update');
Route::delete('tweet/{id}', 'TweetController@destroy')->name('tweet.destroy');
