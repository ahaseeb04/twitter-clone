<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Timeline'], function () {
        Route::get('/timeline', 'TimelineController@index');
    });

    Route::group(['namespace' => 'Tweets'], function () {
        Route::post('/tweets', 'TweetController@store');

        Route::post('/tweets/{tweet}/likes', 'TweetLikeController@store');
        Route::delete('/tweets/{tweet}/likes', 'TweetLikeController@destroy');
    });
});