<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $editingUser = [
        'id' => null,
        'name' => '',
        'email' => '',
    ];
    protected $updatesQueryString = ['sortField', 'sortDirection', 'page'];
    protected $rules = [
        'editingUser.name' => 'required|string|max:255',
        'editingUser.email' => 'required|email|max:255',
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function render()
    {
        $users = User::query()
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.users-table', [
            'users' => $users,
        ]);
    }

    public function edit($userId): void
    {
        $user = User::findOrFail($userId);

        $this->editingUser = $user->only(['id', 'name', 'email']);
    }


    public function delete($userId): void
    {
        User::findOrFail($userId)->delete();
        session()->flash('message', 'Пользователь удалён успешно.');
    }

    public function save(): void
    {
        $this->validate();

        $user = User::findOrFail($this->editingUser['id']);

        $user->update([
            'name' => $this->editingUser['name'],
            'email' => $this->editingUser['email'],
        ]);

        $this->editingUser = [
            'id' => null,
            'name' => '',
            'email' => '',
        ];

        session()->flash('message', 'Пользователь сохранён успешно.');
    }

    public function cancelEdit(): void
    {
        $this->editingUser = [
            'id' => null,
            'name' => '',
            'email' => '',
        ];
    }
}
