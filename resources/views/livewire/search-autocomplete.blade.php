<div x-data="{ open: @entangle('hasResults') }" class="relative">
    <input class="border px-4 py-2 mb-4 w-full" type="text"
           wire:model.live.debounce.300ms="query" placeholder="Поиск...">
    <ul x-show="open" class="bg-white border border-solid absolute w-full">
        @foreach($results as $result)
            <li class="px-5 py-3">
                <a href="{{ route('user.show', $result->id) }}">{{ $result->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
