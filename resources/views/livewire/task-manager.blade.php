<div class="max-w-2xl mx-auto py-10" x-data="{ openModal: false }" x-on:close-modal.window="openModal = false">
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex justify-end mb-4 cursor-pointer">
        <button @click="openModal = true; $wire.resetFields()" class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">
            Добавить задачу
        </button>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-3 text-left">Задача</th>
                <th class="p-3 text-center">Статус</th>
                <th class="p-3 text-right">Действия</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($tasks as $task)
            <tr class="border-b">
                <td class="p-3">
                    @if ($task->is_completed)
                        <s>{{ $task->title }}</s>
                    @else
                        {{ $task->title }}
                    @endif
                </td>
                <td class="p-3 text-center">
                    <input type="checkbox" wire:click="markAsCompleted({{ $task->id }})" @if($task->is_completed) checked @endif>
                </td>
                <td class="p-3 text-right">
                    <button wire:click="edit({{ $task->id }})" @click="openModal = true" class="text-blue-500 mr-2 cursor-pointer">Редактировать</button>
                    <button wire:click="delete({{ $task->id }})" class="text-red-500 cursor-pointer">Удалить</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="p-3 text-center">Нет задач</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div x-show="openModal" class="fixed inset-0 flex items-center justify-center bg-gray-200 bg-opacity-10">
        <div class="bg-white w-full max-w-lg mx-auto rounded shadow p-6">
            <h2 class="text-xl font-bold mb-4" x-text="$wire.isEditMode ? 'Редактировать задачу' : 'Добавить задачу'"></h2>

            <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                <div class="mb-4">
                    <label class="block text-gray-700">Название задачи:</label>
                    <input type="text" wire:model="title" class="w-full border p-2 rounded">
                    @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="openModal = false" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 cursor-pointer">Отмена</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
