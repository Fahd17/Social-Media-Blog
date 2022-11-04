<?php

namespace Database\Factories;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factory>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $count = count(UserProfile::all());
        return [
            "comment_text" => fake()->realText($maxNbChars = 20, $indexSize = 2),
            "user_profile_id" => fake()->numberBetween(1, $count),
        ];
    }
}
