<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "profile_name" => fake()->unique()->userName(),
            "profile_image" => fake()->name(),
            "date_of_birth" => fake()->dateTimeBetween($startDate = '-45 years', $endDate = '-15 years', $timezone = null)
        ];
    }
}
