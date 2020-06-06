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
        if ($user->id !== $tweet->user_id) {
            abort(404);
        }

        return view('tweets.show', compact('tweet'));
    }
}
