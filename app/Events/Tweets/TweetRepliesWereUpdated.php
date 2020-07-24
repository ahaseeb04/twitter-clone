<?php

namespace App\Events\Tweets;

use App\Models\Tweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TweetRepliesWereUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The event tweet.
     *
     * @var \App\Models\Tweet
     */
    protected $tweet;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Tweet $tweet
     */
    public function __construct(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }

    /**
     * The event name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'TweetRepliesWereUpdated';
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'id' => $this->tweet->id,
            'count' => $this->tweet->replies->count()
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('tweets');
    }
}
