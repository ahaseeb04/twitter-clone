<?php

namespace App\Models;

use App\Support\Media\MediaTypes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function getPresignedUrl()
    {
        $client = Storage::disk('s3')->getDriver()->getAdapter()->getClient();
        $expiry = '1 week';

        $command = $client->getCommand('GetObject', [
            'Bucket' => config('filesystems.disks.s3.bucket'),
            'Key' => $this->id . '/' . $this->file_name,
        ]);
        
        $key = 'presigned_url:' . $this->id;
        
        if (!Cache::get($key)) {
            $request = $client->createPresignedRequest($command, $expiry);
            $value = (string) $request->getUri();

            Cache::add($key, $value, 604785);
        }

        return Cache::get($key);
    }

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