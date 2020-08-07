<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Support\Tweets\Entities\EntityTypes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * Scope a query to pluck parent tweets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    public function scopeParent(Builder $builder)
    {
        $builder->whereNull('parent_id');
    }

    /**
     * Get a collection of parent tweets.
     *
     * @return \Illuminate\Support\Collection
     */
    public function parents()
    {
        $base = $this;
        $parents = [];

        while ($base->parentTweet) {
            $parents[] = $base->parentTweet;
            $base = $base->parentTweet;
        }

        return collect($parents);
    }

    /**
     * Get the user that this tweet belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent tweet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentTweet()
    {
        return $this->belongsTo(Tweet::class, 'parent_id');
    }

    /**
     * Get the original tweet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function originalTweet()
    {
        return $this->hasOne(Tweet::class, 'id', 'original_tweet_id');
    }

    /**
     * Get the retweeted tweet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function retweetedTweet()
    {
        return $this->hasOne(Tweet::class, 'original_tweet_id', 'id');
    }

    /**
     * Get the replies associated with this tweet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Tweet::class, 'parent_id');
    }

    /**
     * Get the retweets associated with this tweet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function retweets()
    {
        return $this->hasMany(Tweet::class, 'original_tweet_id');
    }

    /**
     * Get the likes associated with this tweet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get the images and videos attached to this tweet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media()
    {
        return $this->hasMany(TweetMedia::class);
    }

    /**
     * Get the entities associated with this tweet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entities()
    {
        return $this->hasMany(Entity::class);
    }

    /**
     * Get the mentions associated with this tweet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mentions()
    {
        return $this->hasMany(Entity::class)
            ->whereType(EntityTypes::MENTION);
    }
}
