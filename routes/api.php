<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Timeline'], function () {
        Route::get('/timeline', 'TimelineController@index');
    });

    Route::group(['prefix' => '/tweets', 'namespace' => 'Tweets'], function () {
        Route::post('/', 'TweetController@store');

        Route::post('/{tweet}/likes', 'TweetLikeController@store');
        Route::delete('/{tweet}/likes', 'TweetLikeController@destroy');

        Route::post('/{tweet}/retweets', 'TweetRetweetController@store');
        Route::delete('/{tweet}/retweets', 'TweetRetweetController@destroy');

        Route::post('/{tweet}/quotes', 'TweetQuoteController@store');
    });

    Route::group(['namespace' => 'Media'], function () {
        Route::post('/media', 'MediaController@store');
        
        Route::get('/media/types', 'MediaTypesController@index');
    });
});