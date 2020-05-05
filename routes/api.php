<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Timeline'], function () {
        Route::get('/timeline', 'TimelineController@index');
    });

    Route::group(['prefix' => '/tweets', 'namespace' => 'Tweets'], function () {
        Route::post('/', 'TweetController@store');

        Route::group(['prefix' => '/{tweet}'], function () {
            Route::post('/replies', 'TweetReplyController@store');

            Route::post('/retweets', 'TweetRetweetController@store');
            Route::delete('/retweets', 'TweetRetweetController@destroy');

            Route::post('/quotes', 'TweetQuoteController@store');

            Route::post('/likes', 'TweetLikeController@store');
            Route::delete('/likes', 'TweetLikeController@destroy');
        });
    });

    Route::group(['namespace' => 'Media'], function () {
        Route::post('/media', 'MediaController@store');
        
        Route::get('/media/types', 'MediaTypesController@index');
    });
});