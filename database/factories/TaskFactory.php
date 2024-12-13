<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\TaskPriority;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'user_id' => User::factory(),
			'name' => fake()->sentence(),
			'at' => fake()->dateTime(),
			'description' => fake()->paragraph(),
			'type' => fake()->randomElement(array_column(TaskPriority::cases(), 'value')),
        ];
    }
}
