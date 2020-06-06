<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Support\Tweets\TweetTypes;
use App\Http\Controllers\Controller;
use App\Events\Tweets\TweetWasCreated;
use App\Events\Tweets\TweetWasDeleted;
use App\Notifications\Tweets\TweetRetweeted;
use App\Events\Tweets\TweetRetweetsWereUpdated;

class TweetRetweetController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

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
            'type' => TweetTypes::RETWEET
        ]);

        if ($request->user()->id !== $tweet->user_id) {
            $tweet->user->notify(new TweetRetweeted($request->user(), $tweet));
        }

        broadcast(new TweetWasCreated($retweet));
        broadcast(new TweetRetweetsWereUpdated($request->user(), $tweet));
    }

    /**
     * Undocumented function
     *
     * @param Tweet $tweet
     * @param Request $request
     * @return void
     */
    public function destroy(Tweet $tweet, Request $request)
    {
        broadcast(new TweetWasDeleted($tweet->retweetedTweet));

        $tweet->retweetedTweet()->where('user_id', $request->user()->id)->delete();
    
        broadcast(new TweetRetweetsWereUpdated($request->user(), $tweet));
    }
}
