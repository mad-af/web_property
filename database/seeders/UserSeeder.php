<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "firstName" => "Super",
            "lastName" => "Admin",
            "email" => "admin@super.id",
            "username" => "admin@super.id",
            "password" => Hash::make("admin2021"),
            "role" => 3
        ]);
    }
}
