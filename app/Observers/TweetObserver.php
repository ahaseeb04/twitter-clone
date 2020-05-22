<?php

namespace App\Observers;

use App\Models\Tweet;
use App\Support\Tweets\Entities\EntityExtractor;

class TweetObserver
{
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
