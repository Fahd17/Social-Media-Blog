<?php

namespace Database\Seeders;

use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hard coding a user profile for testing
        $a = new UserProfile;
        $a->profile_name = "Fahd";
        $a->profile_image = "Image";
        $a->date_of_birth = "2002-11-22";
        $a->save();

        UserProfile::factory()->count(10)->create();
    }
}
