<div>
    <h2 class="text-xl font-bold mb-4">Уведомления</h2>

    @if ($notifications && $notifications->count() > 0)
        <button wire:click="markAllAsRead" class="text-blue-500 mb-4">Пометить все как прочитанные</button>

        <ul class="bg-white rounded shadow divide-y">
            @foreach ($notifications as $notification)
                <li class="p-4 flex justify-between items-center {{ $notification->is_read ? 'bg-gray-100' : '' }}">
                    <div>
                        <p class="text-gray-800">{{ $notification->data['message'] }}</p>
                        <p class="text-gray-500 text-sm">{{ $notification->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="flex items-center">
                        @if (!$notification->is_read)
                            <button wire:click="markAsRead({{ $notification->id }})" class="text-blue-500">Прочитано</button>
                        @endif
                        <button wire:click="deleteNotification({{ $notification->id }})" class="text-red-500 ml-2">Удалить</button>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>У вас нет новых уведомлений.</p>
    @endif
</div>
