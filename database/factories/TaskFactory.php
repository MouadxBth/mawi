<?php

namespace Database\Factories;

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
        'name' => fake()->name(),
        'task_list_id' => fake()->numberBetween(0, 100),
        'description' => fake()->paragraph(5),
        'completed' => false,
        'created_at' => now(),
        'updated_at' => now(),
      ];
    }
}
