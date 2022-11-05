<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "image" => fake()->imageUrl(width: 620, height: 480),,
            "caption" => fake()->realText($maxNbChars = 20, $indexSize = 2),
        ];
    }
}
