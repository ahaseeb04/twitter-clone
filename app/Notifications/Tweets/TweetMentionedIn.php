<?php

namespace App\Notifications\Tweets;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Bus\Queueable;
use App\Http\Resources\UserResource;
use Illuminate\Notifications\Notification;
use App\Http\Resources\Tweets\TweetResource;
use App\Notifications\DatabaseNotificationChannel;

class TweetMentionedIn extends Notification
{
    use Queueable;

    /**
     * The user instance.
     *
     * @var \App\Models\User
     */
    protected $user;

    /**
     * The tweet instance.
     *
     * @var \App\Models\Tweet
     */
    protected $tweet;

    /**
     * Create a new notification instance.
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
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            DatabaseNotificationChannel::class
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user' => new UserResource($this->user),
            'tweet' => new TweetResource($this->tweet),
        ];
    }
}
