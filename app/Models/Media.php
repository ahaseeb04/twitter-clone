<?php

namespace App\Models;

use App\Support\Media\MediaTypes;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    /**
     * Get the media type.
     *
     * @return string
     */
    public function type()
    {
        return MediaTypes::type($this->mime_type);
    }
}