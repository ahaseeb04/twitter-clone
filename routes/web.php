<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/notifications', 'namespace' => 'Notifications'], function () {
    Route::get('/', 'NotificationController@index');
});

Route::get('/{user}/status/{tweet}', 'Tweets\TweetController@show');
