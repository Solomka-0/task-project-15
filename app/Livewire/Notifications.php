<?php

namespace App\Livewire;

use App\Models\Notification;
use Livewire\Component;

class Notifications extends Component
{
    public $notifications;

    public function getListeners(): array
    {
        $userId = auth()->id();

        return [
            "echo:App.User.{$userId},NewNotification" => 'refreshNotifications',
            'newNotification' => 'refreshNotifications',
        ];
    }

    public function mount(): void
    {
        $this->refreshNotifications();
    }

    public function refreshNotifications(): void
    {
        $this->notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function markAsRead($notificationId)
    {
        $notification = Notification::find($notificationId);

        if ($notification && $notification->user_id == auth()->id()) {
            $notification->update(['is_read' => true]);
            $this->refreshNotifications();
        }
    }

    public function markAllAsRead()
    {
        Notification::where('user_id', auth()->id())->update(['is_read' => true]);
        $this->refreshNotifications();
    }

    public function deleteNotification($notificationId)
    {
        $notification = Notification::find($notificationId);

        if ($notification && $notification->user_id == auth()->id()) {
            $notification->delete();
            $this->refreshNotifications();
        }
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
