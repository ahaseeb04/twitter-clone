<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Models\Tweet;
use App\Models\TweetMedia;
use App\Support\Tweets\TweetTypes;
use App\Http\Controllers\Controller;
use App\Notifications\Tweets\TweetRepliedTo;
use App\Events\Tweets\TweetRepliesWereUpdated;
use App\Http\Requests\Tweet\TweetStoreRequest;
use App\Http\Resources\Tweets\TweetCollection;

class TweetReplyController extends Controller
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
     * @param Tweet $tweet
     * @param TweetStoreRequest $request
     * @return void
     */
    public function store(Tweet $tweet, TweetStoreRequest $request)
    {
        $reply = $request->user()->tweets()->create(array_merge($request->only('body'), [
            'parent_id' => $tweet->id,
            'type' => TweetTypes::TWEET
        ]));

        foreach ($request->media as $id) {
            $reply->media()->save(TweetMedia::find($id));
        }

        if ($request->user()->id !== $tweet->user_id) {
            $tweet->user->notify(new TweetRepliedTo($request->user(), $reply));
        }
        
        broadcast(new TweetRepliesWereUpdated($tweet));
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
            'replies.user', 
            'replies.parentTweet.parentTweet'
        ]);

        return new TweetCollection($tweet->replies);
    }
}
