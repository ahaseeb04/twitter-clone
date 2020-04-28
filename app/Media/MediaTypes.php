<?php

namespace App\Media;

class MediaTypes
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    public static $image = [
        'image/png',
        'image/jpg',
        'image/jpeg',
    ];

    /**
     * Undocumented variable
     *
     * @var array
     */
    public static $video = [
        'video/mp4',
    ];

    /**
     * Undocumented function
     *
     * @param [type] $mime
     * @return void
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
     * Undocumented function
     *
     * @return void
     */
    public static function all()
    {
        return array_merge(self::$image, self::$video);
    }
}