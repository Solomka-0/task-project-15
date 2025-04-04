<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewNotification extends Notification
{
    use Queueable;

    public function via($notifiable): array
    {
        return ['broadcast'];
    }

    public function toArray($notifiable): array
    {
        return [
            'message' => 'У вас новое уведомление!',
        ];
    }
}
