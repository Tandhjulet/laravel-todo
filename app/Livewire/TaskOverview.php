<?php

namespace App\Livewire;

use App\Enums\TaskPriority;
use App\Models\Task;
use Livewire\Component;

class TaskOverview extends Component
{

	public function delete(Task $task) {
		Task::whereId($task->id)->delete();
	}

	public function update() {
		
	}

    public function render()
    {
        return view('livewire.task-overview')->with([
			'tasks' => Task::all(),
			'types' => TaskPriority::cases(),
		]);
    }
}
