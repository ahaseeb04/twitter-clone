<?php

namespace App\Notifications;

use ReflectionClass;
use Illuminate\Notifications\Notification;

class DatabaseNotificationChannel
{
    /**
     * Undocumented function
     *
     * @param [type] $notifiable
     * @param Notification $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toArray($notifiable);

        return $notifiable->routeNotificationFor('database')->create([
            'id' => $notification->id,
            'type' => (new ReflectionClass($notification))->getShortName(),
            'data' => $data,
            'read_at' => null,
        ]);
    }   
}