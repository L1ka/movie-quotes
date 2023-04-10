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
            'quote' => [
                'en' => fake()->sentence,
                'ka' => fake('ka_GE')->realText(60)
            ],
            'thumbnail' => fake()->imageUrl(200, 200, 'animals', true),
            'movie_id' => Movie::factory(),
        ];
    }
}
