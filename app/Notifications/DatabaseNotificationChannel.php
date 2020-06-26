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
        return $notifiable->routeNotificationFor('database')->create([
            'id' => $notification->id,
            'type' => (new ReflectionClass($notification))->getShortName(),
            'data' => $notification->toArray($notifiable),
            'read_at' => null,
        ]);
    }   
}