<?php

namespace App\Http\Controllers\Api\Media;

use App\Support\Media\MediaTypes;
use App\Http\Controllers\Controller;

class MediaTypesController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function __invoke()
    {
        return response()->json([
            'data' => [
                'image' => MediaTypes::$image,
                'video' => MediaTypes::$video,
            ]
        ]);
    }
}
