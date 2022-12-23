<?php

namespace Database\Factories;
use App\Models\UserProfile;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userProfilesCount = count(UserProfile::all());
        $postsCount = count(Post::all());
        $commentsCount = count(Comment::all());

        // 
        if ($this->faker->boolean()) {

            $likeableId = fake()->numberBetween(1, $postsCount);
            $likeableType = "App\Models\Post";
          } else {
            
            $likeableId = fake()->numberBetween(1, $commentsCount);
            $likeableType = "App\Models\Comment";
          }

        return [

            "user_profile_id" => fake()->numberBetween(1, $userProfilesCount),
            "likeable_id" => $likeableId,
            "likeable_type" => $likeableType,
        ];
    }
}
