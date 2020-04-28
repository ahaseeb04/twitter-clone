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

        Route::post('/tweets/{tweet}/retweets', 'TweetRetweetController@store');
        Route::delete('/tweets/{tweet}/retweets', 'TweetRetweetController@destroy');
    });

    Route::group(['namespace' => 'Media'], function () {
        Route::get('/media/types', 'MediaTypesController@index');
    });
});