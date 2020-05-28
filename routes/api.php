<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/timeline', 'namespace' => 'Timeline'], function () {
    Route::get('/', 'TimelineController');
});

Route::group(['prefix' => '/tweets', 'namespace' => 'Tweets'], function () {
    Route::get('/', 'TweetController@index');
    Route::post('/', 'TweetController@store');
    Route::get('/{tweet}', 'TweetController@show');

    Route::group(['prefix' => '/{tweet}'], function () {
        Route::post('/replies', 'TweetReplyController@store');
        Route::get('/replies', 'TweetReplyController@show');

        Route::post('/retweets', 'TweetRetweetController@store');
        Route::delete('/retweets', 'TweetRetweetController@destroy');

        Route::post('/quotes', 'TweetQuoteController@store');

        Route::post('/likes', 'TweetLikeController@store');
        Route::delete('/likes', 'TweetLikeController@destroy');
    });
});

Route::group(['prefix' => '/media', 'namespace' => 'Media'], function () {
    Route::post('/', 'MediaController@store');
    
    Route::get('/types', 'MediaTypesController');
});

Route::group(['prefix' => '/notifications', 'namespace' => 'Notifications'], function () {
    Route::get('/', 'NotificationController');
});