<?php

namespace App\Http\Resources\Tweets;

use App\Http\Resources\UserResource;
use App\Http\Resources\Media\MediaCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Entities\EntityCollection;

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
            'body' => $this->body,
            'type' => $this->type,
            'entities' => new EntityCollection($this->entities),
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
