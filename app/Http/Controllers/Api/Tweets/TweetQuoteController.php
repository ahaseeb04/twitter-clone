<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Models\Tweet;
use App\Tweets\TweetTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Tweets\TweetWasCreated;
use App\Events\Tweets\TweetRetweetsWereUpdated;

class TweetQuoteController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Tweet $tweet
     * @param Request $request
     * @return void
     */
    public function store(Tweet $tweet, Request $request)
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
