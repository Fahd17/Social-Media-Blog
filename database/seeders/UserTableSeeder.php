<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $u = new User;
        $u->name = "Fahd";
        $u->email = "fahdsattam8@gmail.com";
        $u->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $u->save();

        User::factory()->has(
            UserProfile::factory()->has(
                Post::factory()->has(Comment::factory()->count(3))
                ->count(3))
                ->count(1))->count(10)
                ->create();

    }
}
