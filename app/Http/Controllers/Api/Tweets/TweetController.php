<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Models\Tweet;
use App\Models\TweetMedia;
use Illuminate\Http\Request;
use App\Support\Tweets\TweetTypes;
use App\Http\Controllers\Controller;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Requests\Tweet\TweetStoreRequest;
use App\Http\Resources\Tweets\TweetCollection;
use App\Notifications\Tweets\TweetMentionedIn;

class TweetController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])
            ->only(['store']);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
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
     * Undocumented function
     *
     * @param TweetStoreRequest $request
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
     * Undocumented function
     *
     * @param Tweet $tweet
     * @return void
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
}
