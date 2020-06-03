<?php

namespace App\Http\Controllers\Tweets;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TweetController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Tweet $tweet
     * @return void
     */
    public function show(User $user, Tweet $tweet)
    {
        return view('tweets.show', compact('tweet'));
    }
}
