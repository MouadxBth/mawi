<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Board;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $user = User::factory()->create([
        'name' => fake()->name(),
        'email' => "mouad.bouthaich@outlook.com",
        'email_verified_at' => now(),
        'password' => bcrypt("password"), // password
        'remember_token' => Str::random(10),
      ]);

      Board::factory(5)->for($user)->create();
    }
}
