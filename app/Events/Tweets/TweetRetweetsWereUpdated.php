<?php

namespace App\Events\Tweets;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TweetRetweetsWereUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The event user.
     *
     * @var \App\Models\User
     */
    protected $user;

    /**
     * The event tweet.
     *
     * @var \App\Models\Tweet
     */
    protected $tweet;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Tweet $tweet
     */
    public function __construct(User $user, Tweet $tweet)
    {
        $this->user = $user;
        $this->tweet = $tweet;
    }

    /**
     * The event name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'TweetRetweetsWereUpdated';
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
            'user_id' => $this->user->id,
            'count' => $this->tweet->retweets->count()
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
