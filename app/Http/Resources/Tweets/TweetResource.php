<?php

namespace App\Http\Resources\Tweets;

use App\Http\Resources\UserResource;
use App\Http\Resources\Media\MediaCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'body' => $this->body,
            'type' => $this->type,
            'media' => new MediaCollection($this->media),
            'replies_count' => $this->replies->count(),
            'retweets_count' => $this->retweets->count(),
            'likes_count' => $this->likes->count(),
            'created_at' => $this->created_at->timestamp,
            'user' => new UserResource($this->user),
            'parent_tweet' => new TweetResource($this->parentTweet),
            'original_tweet' => new TweetResource($this->originalTweet)
        ];
    }
}
