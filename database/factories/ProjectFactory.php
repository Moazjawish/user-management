<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['E-commerce', 'E-learning', 'Task Management', 'Yalla-go', 'Talabati', 'Bee-order']),
            'description' => fake()->realTextBetween(160,200,2)
        ];
    }
}
