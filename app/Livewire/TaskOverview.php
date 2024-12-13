<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskOverview extends Component
{
    public function render()
    {
        return view('livewire.task-overview')->with([
			'tasks' => Task::all()
		]);
    }
}
