<?php

namespace App\Models;

use App\Media\Media;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class TweetMedia extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * Undocumented function
     *
     * @return void
     */
    public function baseMedia()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }
}
