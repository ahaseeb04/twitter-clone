<?php

use Illuminate\Support\Facades\Route;

Route::prefix('timeline')->namespace('timeline')->group(function () {
    Route::get('/', 'TimelineController');
});

Route::prefix('tweets')->namespace('tweets')->group(function () {
    Route::get('/', 'TweetController@index');
    Route::post('/', 'TweetController@store');
    Route::get('/{tweet}', 'TweetController@show');

    Route::prefix('{tweet}')->group(function () {
        Route::post('/replies', 'TweetReplyController@store');
        Route::get('/replies', 'TweetReplyController@show');

        Route::post('/retweets', 'TweetRetweetController@store');
        Route::delete('/retweets', 'TweetRetweetController@destroy');

        Route::post('/quotes', 'TweetQuoteController');

        Route::post('/likes', 'TweetLikeController@store');
        Route::delete('/likes', 'TweetLikeController@destroy');
    });
});

Route::prefix('media')->namespace('media')->group(function () {
    Route::post('/', 'MediaController');

    Route::get('/types', 'MediaTypesController');
});

Route::group(['prefix' => '/notifications', 'namespace' => 'Notifications'], function () {
    Route::get('/', 'NotificationController');
});