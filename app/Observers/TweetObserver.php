<?php

namespace App\Observers;

use App\Models\Tweet;
use Illuminate\Support\Str;
use App\Support\Tweets\Entities\EntityExtractor;

class TweetObserver
{
    /**
     * Undocumented function
     *
     * @param Tweet $tweet
     * @return void
     */
    public function creating(Tweet $tweet)
    {
        $tweet->uuid = Str::uuid();
    }

    /**
     * Undocumented function
     *
     * @param Tweet $tweet
     * @return void
     */
    public function created(Tweet $tweet)
    {
        $tweet->entities()->createMany(
            (new EntityExtractor($tweet->body))->getEntities()
        );
    }
}
