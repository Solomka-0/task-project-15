@extends('welcome')
@section('content')
    <div class="mt-8">
        @livewire('users-table') <!-- Подключение компонента UsersTable -->
    </div>
@endsection
