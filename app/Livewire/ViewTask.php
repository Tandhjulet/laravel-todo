<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class ViewTask extends Component
{
    public function render(Task $task)
    {
        return view('livewire.view-task')->with([
			'task' => $task,
		]);
    }
}
