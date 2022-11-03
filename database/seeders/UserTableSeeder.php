<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Post;
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
        $u->password = "pass1";
        $u->save();

        User::factory()->has(
            UserProfile::factory()->has(
                Post::factory()->count(3))
                ->count(1))->count(10)
                ->create();

    }
}
