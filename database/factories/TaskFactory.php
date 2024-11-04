<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
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
            'title' => fake()->jobTitle(),
            'description' => fake()->realTextBetween(160,200,2),
            'status' => fake()->randomElement(['completed', 'planned','new']),
            'user_id' => fake()->numberBetween(1,User::count()),
            'project_id' => fake()->numberBetween(1,Project::count()),
        ];
    }
}
