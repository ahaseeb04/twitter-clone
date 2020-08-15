<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('notifications')->namespace('Notifications')->group(function () {
    Route::get('/', 'NotificationController@index');
});

Route::prefix('{user}')->group(function () {
    Route::namespace('Tweets')->group(function () {
        Route::get('/status/{tweet}', 'TweetController');
    });
});
