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
        $data = [
            [
                "firstName" => "Super",
                "lastName" => "Admin",
                "email" => "admin@super.id",
                "username" => "admin@super.id",
                "password" => Hash::make("admin2021"),
                "role" => 3
            ],
            [
                "firstName" => "Hello",
                "lastName" => "Admin",
                "email" => "admin@hello.id",
                "username" => "admin@hello.id",
                "password" => Hash::make("admin2021"),
                "role" => 2
            ],
            [
                "firstName" => "Ahmad",
                "lastName" => "Suparjo",
                "email" => "suparjo@gmail.id",
                "username" => "ahmad",
                "password" => Hash::make("ahmad"),
                "role" => 3
            ],
        ];

        foreach ($data as $value) {
            User::create($value);
        }
    }
}
