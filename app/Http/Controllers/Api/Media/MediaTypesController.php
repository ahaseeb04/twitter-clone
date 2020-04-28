<?php

namespace App\Http\Controllers\Api\Media;

use App\Media\MediaTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaTypesController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return response()->json([
            'data' => [
                'image' => MediaTypes::$image,
                'video' => MediaTypes::$video,
            ]
        ]);
    }
}
