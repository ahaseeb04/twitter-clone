<?php

namespace App\Support\Tweets\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class EntityDatabaseCollection extends Collection
{
    /**
     * Get a collection of users mentioned in the tweet.
     *
     * @return \App\Models\User
     */
    public function users()
    {
        return User::whereIn('username', $this->pluck('body_plain'))->get();
    }
}
