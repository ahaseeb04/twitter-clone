<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Support\Tweets\Entities\EntityTypes;

class Tweet extends Model
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * Undocumented function
     *
     * @param Builder $builder
     * @return void
     */
    public function scopeParent(Builder $builder)
    {
        $builder->whereNull('parent_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function parentTweet()
    {
        return $this->hasOne(Tweet::class, 'id', 'parent_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function originalTweet()
    {
        return $this->hasOne(Tweet::class, 'id', 'original_tweet_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function retweetedTweet()
    {
        return $this->hasOne(Tweet::class, 'original_tweet_id', 'id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function replies()
    {
        return $this->hasMany(Tweet::class, 'parent_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function retweets()
    {
        return $this->hasMany(Tweet::class, 'original_tweet_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function media()
    {
        return $this->hasMany(TweetMedia::class);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function entities()
    {
        return $this->hasMany(Entity::class);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function mentions()
    {
        return $this->hasMany(Entity::class)
            ->whereType(EntityTypes::MENTION);
    }
}
