<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/notifications', 'namespace' => 'Notifications'], function () {
    Route::get('/', 'NotificationController@index');
});

Route::group(['prefix' => '/{user}'], function () {
    Route::group(['namespace' => 'Tweets'], function () {
        Route::get('/status/{tweet}', 'TweetController');
    });
});