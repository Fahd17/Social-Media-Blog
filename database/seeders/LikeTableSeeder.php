<?php

namespace Database\Seeders;

use App\Models\Like;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $like = new Like;
        $like -> user_profile_id = 1;
        $like -> likeable_id = 1;
        $like -> likeable_type = "App\Models\Comment";
        $like -> save();

        Like::factory()->count(250)->create();
    }
}
