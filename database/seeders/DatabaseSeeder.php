<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {	
        User::factory()->count(10)->create();
		Task::factory()->count(100)->make()->each(function ($task) {
			$task->user()->associate(User::inRandomOrder()->first());
			$task->save();
		});
    }
}
