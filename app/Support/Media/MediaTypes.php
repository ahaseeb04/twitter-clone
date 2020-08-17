<?php

namespace App\Support\Media;

class MediaTypes
{
    /**
     * The image types that are allowed.
     *
     * @var array
     */
    public static $image = [
        'image/png',
        'image/gif',
        'image/jpg',
        'image/jpeg',
    ];

    /**
     * The video types that are allowed.
     *
     * @var array
     */
    public static $video = [
        'video/mp4',
    ];

    /**
     * Determine the type based on the given mime.
     *
     * @param string $mime
     * @return string|null
     */
    public static function type($mime)
    {
        if (in_array($mime, self::$image)) {
            return 'image';
        }

        if (in_array($mime, self::$video)) {
            return 'video';
        }

        return null;
    }

    /**
     * Get the media types that are allowed.
     *
     * @return array
     */
    public static function all()
    {
        return array_merge(self::$image, self::$video);
    }
}
