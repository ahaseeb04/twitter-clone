<?php

use Illuminate\Support\Facades\Route;

Route::prefix('timeline')->namespace('Timeline')->group(function () {
    Route::get('/', 'TimelineController');
});

Route::prefix('tweets')->namespace('Tweets')->group(function () {
    Route::get('/', 'TweetController@index');
    Route::post('/', 'TweetController@store');
    
    Route::prefix('{tweet}')->group(function () {
        Route::get('/', 'TweetController@show');
        Route::delete('/', 'TweetController@destroy');

        Route::get('/replies', 'TweetReplyController@show');
        Route::post('/replies', 'TweetReplyController@store');

        Route::post('/retweets', 'TweetRetweetController@store');
        Route::delete('/retweets', 'TweetRetweetController@destroy');

        Route::post('/quotes', 'TweetQuoteController');

        Route::post('/likes', 'TweetLikeController@store');
        Route::delete('/likes', 'TweetLikeController@destroy');
    });
});

Route::prefix('media')->namespace('Media')->group(function () {
    Route::post('/', 'MediaController');

    Route::get('/types', 'MediaTypesController');
});

Route::prefix('notifications')->namespace('Notifications')->group(function () {
    Route::get('/', 'NotificationController');
});
