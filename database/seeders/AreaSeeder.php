<?php

namespace Database\Seeders;

use App\Models\Area;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                "id" => 4,
                "name_area" => "Pendidikan",
                "created_at" => Carbon::now()->toDateString(),
                "updated_at" => Carbon::now()->toDateString()
            ],
            [
                "id" => 5,
                "name_area" => "Eksekutif",
                "created_at" => Carbon::now()->toDateString(),
                "updated_at" => Carbon::now()->toDateString()
            ],
            [
                "id" => 6,
                "name_area" => "Finansial",
                "created_at" => Carbon::now()->toDateString(),
                "updated_at" => Carbon::now()->toDateString()
            ],
            [
                "id" => 7,
                "name_area" => "Politik",
                "created_at" => Carbon::now()->toDateString(),
                "updated_at" => Carbon::now()->toDateString()
            ],
            [
                "id" => 8,
                "name_area" => "Wisata",
                "created_at" => Carbon::now()->toDateString(),
                "updated_at" => Carbon::now()->toDateString()
            ],
        ];
        foreach ($data as $value) {
            Area::create($value);
        }
    }
}
