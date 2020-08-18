<?php

namespace App\Observers;

use App\Models\Tweet;
use Illuminate\Support\Str;
use App\Support\Tweets\Entities\EntityExtractor;

class TweetObserver
{
    /**
     * Handle the model's "creating" event.
     *
     * @param \App\Models\Tweet $tweet
     * @return void
     */
    public function creating(Tweet $tweet)
    {
        $tweet->uuid = Str::uuid();
    }

    /**
     * Handle the model's "created" event.
     *
     * @param \App\Models\Tweet $tweet
     * @return void
     */
    public function created(Tweet $tweet)
    {
        $tweet->entities()->createMany(
            (new EntityExtractor($tweet->body))->getEntities()
        );
    }
}
