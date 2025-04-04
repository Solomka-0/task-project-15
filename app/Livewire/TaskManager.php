<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskManager extends Component
{
    public $tasks;
    public $title;
    public $taskId;
    public $isEditMode = false;

    protected $rules = [
        'title' => 'required|min:3',
    ];

    public function render()
    {
        $this->tasks = Task::orderBy('created_at', 'desc')->get();
        return view('livewire.task-manager');
    }

    public function resetFields()
    {
        $this->title = '';
        $this->taskId = null;
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate();

        Task::create([
            'title' => $this->title,
        ]);

        session()->flash('message', 'Задача добавлена успешно.');

        $this->resetFields();

        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->title = $task->title;
        $this->taskId = $task->id;
        $this->isEditMode = true;
    }

    public function update(): void
    {
        $this->validate();

        $task = Task::findOrFail($this->taskId);
        $task->update([
            'title' => $this->title,
        ]);

        session()->flash('message', 'Задача обновлена успешно.');

        $this->resetFields();

        // Отправляем событие для закрытия модального окна
        $this->dispatch('close-modal');
    }

    public function delete($id)
    {
        Task::find($id)->delete();

        session()->flash('message', 'Задача удалена успешно.');
    }

    public function markAsCompleted($id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'is_completed' => !$task->is_completed,
        ]);
    }
}
