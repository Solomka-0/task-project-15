<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;
    public $student_id;
    public $department;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'role' => 'required',
        'student_id' => 'required_if:role,student',
        'department' => 'required_if:role,teacher',
    ];

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => $this->role,
            'student_id' => $this->student_id,
            'department' => $this->department,
        ]);

        session()->flash('message', 'Регистрация прошла успешно!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
