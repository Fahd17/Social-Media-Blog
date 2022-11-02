<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::factory()->count(10)->create();

    }
}
