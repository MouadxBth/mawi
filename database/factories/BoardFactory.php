<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
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
        'owner_id' => fake()->numberBetween(0, 100),
        'description' => fake()->paragraph(5),
        'created_at' => now(),
        'updated_at' => now(),
      ];
    }
}
