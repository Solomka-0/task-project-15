<div>
    @livewire('search-autocomplete') <!-- Подключение компонента UsersTable -->
    <table class="min-w-full bg-white border">
        <thead>
        <tr>
            <th class="px-6 py-3 border-b cursor-pointer" wire:click="sortBy('name')">
                Имя
                @if($sortField == 'name')
                    @if($sortDirection == 'asc')
                        ▲
                    @else
                        ▼
                    @endif
                @endif
            </th>
            <th class="px-6 py-3 border-b cursor-pointer" wire:click="sortBy('email')">
                Email
                @if($sortField == 'email')
                    @if($sortDirection == 'asc')
                        ▲
                    @else
                        ▼
                    @endif
                @endif
            </th>
            <th class="px-6 py-3 border-b">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td class="px-6 py-4 border-b">{{ $user->name }}</td>
                <td class="px-6 py-4 border-b">{{ $user->email }}</td>
                <td class="px-6 py-4 border-b">
                    <button class="bg-blue-500 text-white px-4 py-2 cursor-pointer" wire:click="edit({{ $user->id }})">Редактировать</button>
                    <button class="bg-red-500 text-white px-4 py-2 cursor-pointer" wire:click="delete({{ $user->id }})">Удалить</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

    @if($editingUser['id'])
        <div
            style="background-color: rgba(0, 0, 0, 0.5);"
            class="fixed inset-0 flex items-center justify-center"
        >
            <div class="bg-white p-6 rounded shadow-lg">
                <h2 class="text-xl mb-4">Редактировать пользователя</h2>
                <input
                    wire:model="editingUser.name"
                    type="text"
                    class="border px-4 py-2 mb-4 w-full"
                    placeholder="Имя"
                >
                @error('editingUser.name') <span class="text-red-500">{{ $message }}</span> @enderror

                <input
                    wire:model="editingUser.email"
                    type="email"
                    class="border px-4 py-2 mb-4 w-full cursor-pointer"
                    placeholder="Email"
                >
                @error('editingUser.email') <span class="text-red-500">{{ $message }}</span> @enderror

                <button class="bg-green-500 text-white px-4 py-2 cursor-pointer" wire:click="save">Сохранить</button>
                <button
                    class="bg-gray-500 text-white px-4 py-2 cursor-pointer"
                    wire:click="cancelEdit"
                >
                    Отмена
                </button>
            </div>
        </div>
    @endif
</div>
