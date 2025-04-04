<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class MultiStepForm extends Component
{
    public $currentStep = 1;
    public $totalSteps = 3;

    // Поля формы
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.multi-step-form');
    }

    // Правила валидации для каждого шага
    private function stepRules()
    {
        switch ($this->currentStep) {
            case 1:
                return [
                    'name' => 'required|min:3',
                ];
            case 2:
                return [
                    'email' => 'required|email|unique:users',
                    'phone' => 'required',
                ];
            case 3:
                return [
                    'password' => 'required|min:6|confirmed',
                ];
            default:
                return [];
        }
    }

    public function increaseStep()
    {
        // Валидация текущего шага
        $this->validate($this->stepRules());

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function decreaseStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submit()
    {
        // Валидация всех шагов
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // Создание пользователя
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('message', 'Регистрация прошла успешно!');
        $this->reset();
        $this->currentStep = 1;
    }
}
