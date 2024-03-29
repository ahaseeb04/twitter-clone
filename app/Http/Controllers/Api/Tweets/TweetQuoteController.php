<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Models\Tweet;
use App\Support\Tweets\TweetTypes;
use App\Http\Controllers\Controller;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Requests\Tweet\TweetStoreRequest;
use App\Events\Tweets\TweetRetweetsWereUpdated;

class TweetQuoteController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Undocumented function
     *
     * @param Tweet $tweet
     * @param TweetStoreRequest $request
     * @return void
     */
    public function __invoke(Tweet $tweet, TweetStoreRequest $request)
    {
        $retweet = $request->user()->tweets()->create([
            'original_tweet_id' => $tweet->id,
            'body' => $request->body,
            'type' => TweetTypes::QUOTE
        ]);

        broadcast(new TweetWasCreated($retweet));
        broadcast(new TweetRetweetsWereUpdated($request->user(), $tweet));
    }
}
