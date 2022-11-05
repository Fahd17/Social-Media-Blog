<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hard coding a post for testing
        $p = new Post;
        $p->image = "image";
        $p->caption = "My pic";
        $p->user_profile_id = 1;
        $p->save();

    }
}
