<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(SubSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(AreaSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
