<div x-data="{ step: @entangle('currentStep') }">
    <!-- Шаги формы -->
    <div class="w-full" x-show="step === 1">
        <div class="mb-4">
            <label class="block text-gray-700">Имя:</label>
            <input type="text" wire:model.defer="name" class="w-full border p-2">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button class="px-4 py-2 bg-blue-500 text-white rounded"
                wire:click="increaseStep"
                type="button">
            Далее
        </button>
    </div>

    <div class="w-full" x-show="step === 2">
        <div class="mb-4">
            <label class="block text-gray-700">Email:</label>
            <input type="email" wire:model.defer="email" class="w-full border p-2">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Телефон:</label>
            <input type="text" wire:model.defer="phone" class="w-full border p-2">
            @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button class="bg-gray-500 text-white px-4 py-2 cursor-pointer"
                wire:click="decreaseStep"
                type="button">
            Назад
        </button>
        <button class="px-4 py-2 bg-blue-500 text-white rounded"
                wire:click="increaseStep"
                type="button">
            Далее
        </button>
    </div>

    <div class="w-full" x-show="step === 3">
        <div class="mb-4">
            <label class="block text-gray-700">Пароль:</label>
            <input type="password" wire:model.defer="password" class="w-full border p-2">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Подтверждение пароля:</label>
            <input type="password" wire:model.defer="password_confirmation" class="w-full border p-2">
        </div>

        <button class="bg-gray-500 text-white px-4 py-2 cursor-pointer"
                wire:click="decreaseStep"
                type="button">
            Назад
        </button>
        <button wire:click="submit"
                class="px-4 py-2 bg-green-500 text-white rounded">
            Завершить
        </button>
    </div>
</div>
