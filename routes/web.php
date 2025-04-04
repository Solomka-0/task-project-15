<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Notifications;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return view('users.index');
})->name('users.index');

Route::get('/registration', function () {
    return view('auth.registration');
})->name('registration');

Route::get('/multi-step-form', function () {
    return view('auth.multi-step-form');
})->name('multi-step-form');

Route::get('/user/${id}', function ($id) {
    return \App\Models\User::query()->find($id);
})->name('user.show');

Route::get('/tasks', function () {
    return view('tasks.index');
})->name('tasks.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/generate-notification', [NotificationController::class, 'generate'])->name('generate.notification');
});

require __DIR__.'/auth.php';
