<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given tweet can be deleted by the user.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Tweet $tweet
     * @return bool
     */
    public function delete(User $user, Tweet $tweet)
    {
        return $user->id === $tweet->user_id;
    }
}
