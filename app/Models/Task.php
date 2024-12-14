<?php

namespace App\Models;

use App\Enums\TaskPriority;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends \Eloquent
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

	protected $guarded = [
		'id',
	];

	public function type(): TaskPriority {
		return TaskPriority::from($this->type);
	}

}
