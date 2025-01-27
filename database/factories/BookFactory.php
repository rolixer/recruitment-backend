<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author' => fake()->name(),
            'publish_year' => fake()->year(),
            'description' => fake()->paragraph(),
            'copies_available' => fake()->numberBetween(0, 15),
            'category_id' => fake()->numberBetween(1, 5),
        ];
    }
}
