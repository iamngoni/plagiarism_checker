<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Lecturer";
        $user->email = "lecturer@school.com";
        $user->password = Hash::make("password");
        $user->role = "lecturer";
        $user->save();
    }
}
