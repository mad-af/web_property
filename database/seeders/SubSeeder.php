<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Sub;

class SubSeeder extends Seeder
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
                "attribute" => "salary",
                "name" => "Rp 1.000.000 - Rp 3.000.000",
                "x" => 1
            ],
            [
                "attribute" => "salary",
                "name" => "Rp 3.000.001 - Rp 6.000.000",
                "x" => 2
            ],
            [
                "attribute" => "salary",
                "name" => "Rp 6.000.001 - Rp 9.000.000",
                "x" => 3
            ],
            [
                "attribute" => "salary",
                "name" => "> Rp 9.000.000",
                "x" => 4
            ],
            [
                "attribute" => "houseType",
                "name" => "Kosong",
                "x" => 1
            ],
            [
                "attribute" => "houseType",
                "name" => "Sebagian",
                "x" => 2
            ],
            [
                "attribute" => "houseType",
                "name" => "Lengkap",
                "x" => 3
            ],
            [
                "attribute" => "familyMember",
                "name" => "1 - 2",
                "x" => 1
            ],
            [
                "attribute" => "familyMember",
                "name" => "3 - 4",
                "x" => 2
            ],
            [
                "attribute" => "familyMember",
                "name" => "5 - 6",
                "x" => 3
            ],
            [
                "attribute" => "familyMember",
                "name" => "> 6",
                "x" => 4
            ],
        ];
        
        foreach ($data as $value) {
            Sub::create($value);
        }
    }
}
