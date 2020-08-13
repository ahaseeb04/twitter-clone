<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Models\Tweet;
use App\Models\TweetMedia;
use Illuminate\Http\Request;
use App\Support\Tweets\TweetTypes;
use App\Http\Controllers\Controller;
use App\Events\Tweets\TweetWasCreated;
use App\Events\Tweets\TweetWasDeleted;
use App\Http\Requests\Tweet\TweetStoreRequest;
use App\Http\Resources\Tweets\TweetCollection;
use App\Notifications\Tweets\TweetMentionedIn;

class TweetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('store');
    }

    /**
     * Get all tweets.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(Request $request)
    {
        $tweets = Tweet::with([
            'user',
            'likes',
            'replies',
            'retweets',
            'entities',
            'media.baseMedia',
            'originalTweet.user',
            'originalTweet.likes',
            'originalTweet.retweets',
            'originalTweet.media.baseMedia'
        ])
            ->find(explode(',', $request->ids));

        return new TweetCollection($tweets);
    }

    /**
     * Store a new tweet.
     *
     * @param \App\Http\Requests\Tweet\TweetStoreRequest $request
     * @return void
     */
    public function store(TweetStoreRequest $request)
    {
        $tweet = $request->user()->tweets()->create(array_merge($request->only('body'), [
            'type' => TweetTypes::TWEET
        ]));

        foreach ($request->media as $id) {
            $tweet->media()->save(TweetMedia::find($id));
        }

        foreach ($tweet->mentions->users() as $user) {
            if ($request->user()->id !== $user->id) {
                $user->notify(new TweetMentionedIn($request->user(),  $tweet));
            }
        }

        broadcast(new TweetWasCreated($tweet));
    }

    /**
     * Show the given tweet.
     *
     * @param \App\Models\Tweet $tweet
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function show(Tweet $tweet)
    {
        $tweet->load([
            'user',
            'likes',
            'replies',
            'retweets',
            'entities',
            'media.baseMedia',
            'originalTweet.user',
            'originalTweet.likes',
            'originalTweet.retweets',
            'originalTweet.media.baseMedia',
            'parentTweet.replies',
            'parentTweet.user',
            'parentTweet.likes',
            'parentTweet.retweets',
            'parentTweet.media.baseMedia'
        ]);

        return new TweetCollection(collect([$tweet])->merge($tweet->parents()));
    }

    /**
     * Delete the given tweet.
     *
     * @param \App\Models\Tweet $tweet
     * @return void
     */
    public function destroy(Tweet $tweet)
    {
        $this->authorize('delete', $tweet);

        broadcast(new TweetWasDeleted($tweet));

        $tweet->delete();
    }
}
