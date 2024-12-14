<?php

namespace App\Livewire;

use App\Enums\TaskPriority;
use App\Models\Task;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class TaskOverview extends Component
{	
	public function delete(Task $task) {
		Task::whereId($task->id)->delete();
	}

	protected function rules() {
		return [
			'task.name' => 'required|string|min:6',
			'task.description' => 'required|string|min:20',
			'task.type' => new Enum(TaskPriority::class),
		];
	}

	public function update($name, $description, $type, $id) {
		Task::query()->whereId($id)->update([
			'name' => $name,
			'description' => $description,
			'type' => $type,
		]);

		//dd($name, $description, $type, $id);
	}

    public function render()
    {
        return view('livewire.task-overview')->with([
			'tasks' => Task::all(),
			'types' => TaskPriority::cases(),
		]);
    }
}
