<div>
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-500 text-white">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="register" x-data="{ role: '{{ old('role', $role) }}' }">
        <div class="mb-4">
            <label class="block text-gray-700">Имя:</label>
            <input type="text" wire:model="name" class="w-full border p-2">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email:</label>
            <input type="email" wire:model="email" class="w-full border p-2">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Пароль:</label>
            <input type="password" wire:model="password" class="w-full border p-2">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Подтверждение пароля:</label>
            <input type="password" wire:model="password_confirmation" class="w-full border p-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Роль:</label>
            <select wire:model="role" x-model="role" class="w-full border p-2">
                <option value="">Выберите роль</option>
                <option value="student">Студент</option>
                <option value="teacher">Преподаватель</option>
            </select>
            @error('role') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4" x-show="role == 'student'">
            <label class="block text-gray-700">Номер студенческого билета:</label>
            <input type="text" wire:model="student_id" class="w-full border p-2">
            @error('student_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4" x-show="role == 'teacher'">
            <label class="block text-gray-700">Кафедра:</label>
            <input type="text" wire:model="department" class="w-full border p-2">
            @error('department') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Зарегистрироваться</button>
    </form>
</div>
