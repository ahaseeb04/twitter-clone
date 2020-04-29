<?php

namespace App\Models;

use App\Media\MediaTypes;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function type()
    {
        return MediaTypes::type($this->mime_type);
    }
}