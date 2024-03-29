<?php

namespace App\Http\Controllers\Api\Media;

use App\Models\TweetMedia;
use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaStoreRequest;
use App\Http\Resources\Media\TweetMediaCollection;

class MediaController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Undocumented function
     *
     * @param MediaStoreRequest $request
     * @return void
     */
    public function __invoke(MediaStoreRequest $request)
    {
        $result = collect($request->media)->map(function ($media) {
            return $this->addMedia($media);
        });

        return new TweetMediaCollection($result);
    }

    /**
     * Undocumented function
     *
     * @param [type] $media
     * @return void
     */
    protected function addMedia($media)
    {
        $tweetMedia = TweetMedia::create([]);

        $tweetMedia->baseMedia()
            ->associate($tweetMedia->addMedia($media)->toMediaCollection())
            ->save();
        
        return $tweetMedia;
    }
}
