<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quoteEn' => fake()->sentence,
            'quoteKa' => fake()->sentence,
            'thumbnail' => fake()->sentence,
            'movie_id' => Movie::factory(),
        ];
    }
}
