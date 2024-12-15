<?php

namespace App\Livewire;

use App\Enums\TaskPriority;
use App\Models\Task;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class TaskOverview extends Component
{	
	public $newName = '';
	public $newType = '';
	public $newDescription = '';

	public function delete(Task $task) {
		Task::whereId($task->id)->delete();
	}

	protected function rules() {
		return [
			'newName' => 'required|string|min:5|max:63',
			'newDescription' => 'required|string|min:20',
			'newType' => new Enum(TaskPriority::class),
		];
	}

	public function update($id) {
		$this->validate();

		Task::query()->whereId($id)->update([
			'name' => $this->newName,
			'description' => $this->newDescription,
			'type' => $this->newType,
		]);

		session()->flash('success', 'Opdatede task');
		$this->dispatch('modal-close');

		//dd($id);
	}

    public function render()
    {
        return view('livewire.task-overview')->with([
			'tasks' => Task::all(),
			'types' => TaskPriority::cases(),
		]);
    }
}
