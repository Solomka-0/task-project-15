<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Notifications\NewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function generate()
    {
        $user = Auth::user();

        Notification::create([
            'user_id' => $user->id,
            'type' => 'message',
            'data' => ['message' => 'У вас новое сообщение!'],
        ]);

        // Отправляем событие для обновления уведомлений в реальном времени
        $this->sendNotificationEvent($user);

        return redirect()->back();
    }

    protected function sendNotificationEvent($user)
    {
        $user->notify(new NewNotification());
    }
}
