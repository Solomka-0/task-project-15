<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class NotificationSent implements ShouldBroadcastNow
{
    public $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('notifications.' . $this->userId);
    }
}
