<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Models\Tweet;
use App\Models\TweetMedia;
use App\Tweets\TweetTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Tweets\TweetRepliesWereUpdated;

class TweetReplyController extends Controller
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
        $this->validate($request, [
            'body' => $request->media ? 'max:280' : 'required|max:280'
        ]);

        $reply = $request->user()->tweets()->create(array_merge($request->only('body'), [
            'parent_id' => $tweet->id,
            'type' => TweetTypes::TWEET
        ]));

        foreach ($request->media as $id) {
            $reply->media()->save(TweetMedia::find($id));
        }

        broadcast(new TweetRepliesWereUpdated($tweet));
    }
}
