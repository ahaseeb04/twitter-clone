<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Tweets\TweetType;
use App\Models\TweetMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Requests\Tweets\TweetStoreRequest;

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
     * @param TweetStoreRequest $request
     * @return void
     */
    public function store(TweetStoreRequest $request)
    {
        $tweet = $request->user()->tweets()->create(array_merge($request->only('body'), [
            'type' => TweetType::TWEET
        ]));

        foreach ($request->media as $id) {
            $tweet->media()->save(TweetMedia::find($id));
        }

        broadcast(new TweetWasCreated($tweet));
    }
}
