<?php

namespace App\Http\Resources\Tweets;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TweetCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = TweetResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return void
     */
    public function with($request)
    {
        return [
            'meta' => [
                'likes' => $this->likes($request),
                'retweets' => $this->retweets($request)
            ]
        ];    
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return void
     */
    protected function likes($request) {
        if (!$user = $request->user()) {
            return [];
        }

        return $user->likes()
            ->whereIn(
                'tweet_id',
                $this->collection->pluck('id')
                    ->merge(
                        $this->collection->pluck('original_tweet_id')
                    )
            )
            ->pluck('tweet_id')
            ->toArray();
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return void
     */
    protected function retweets($request) {
        if (!$user = $request->user()) {
            return [];
        }

        return $user->retweets()
            ->whereIn(
                'original_tweet_id',
                $this->collection->pluck('id')
                    ->merge(
                        $this->collection->pluck('original_tweet_id')
                    )
            )
            ->pluck('original_tweet_id')
            ->toArray();
    }
}
