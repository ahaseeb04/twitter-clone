<?php

namespace App\Http\Controllers\Api\Tweets;

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
        $tweet = $request->user()->tweets()->create($request->only('body'));

        broadcast(new TweetWasCreated($tweet));
    }
}
