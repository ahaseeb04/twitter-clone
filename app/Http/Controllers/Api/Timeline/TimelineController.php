<?php

namespace App\Http\Controllers\Api\Timeline;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Tweets\TweetCollection;

class TimelineController extends Controller
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
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $tweets = $request->user()
            ->tweetsFromFollowing()
            ->latest()
            ->with([
                'user',
                'likes'
            ])
            ->paginate(25);

        return new TweetCollection($tweets);
    }
}
