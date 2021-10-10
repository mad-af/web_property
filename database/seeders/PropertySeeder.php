<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Property;

class PropertySeeder extends Seeder
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
                'title' => 'Bumi Indah City',
                'price' => 300000000,
                'address' => 'Cirebon, Jawa Barat',
                'image' => 'images/property/image_1.jpg',
                'status' => 0,
                'category' => 0,
                'bedRoom' => 2,
                'bathRoom' => 1,
                'parkingLot' => 1,
                'heating' => 1,
                'length' => 500,
                'width' => 400,
                'description' => 'Ini merupakan sebuah rumah yang bagus' ,
                'subSalaryId' => 3,
                'subHomeFurnitureId' => 6,
                'subFamilyMemberId' => 10
            ],
            [
                'title' => 'Grend Royal Regency',
                'price' => 250000000,
                'address' => 'Sidoarjo, Jawa Timur',
                'image' => 'images/property/image_2.jpg',
                'status' => 0,
                'category' => 0,
                'bedRoom' => 2,
                'bathRoom' => 2,
                'parkingLot' => 0,
                'heating' => 0,
                'length' => 300,
                'width' => 200,
                'description' => 'Ini merupakan sebuah rumah yang mantap' ,
                'subSalaryId' => 2,
                'subHomeFurnitureId' => 5,
                'subFamilyMemberId' => 9
            ],
            [
                'title' => 'Arco Green Parung',
                'price' => 100000000,
                'address' => 'Sleman, Jawa Tengah',
                'image' => 'images/property/image_3.jpg',
                'status' => 0,
                'category' => 0,
                'bedRoom' => 1,
                'bathRoom' => 0,
                'parkingLot' => 0,
                'heating' => 0,
                'length' => 100,
                'width' => 200,
                'description' => 'Ini merupakan sebuah rumah yang biasa' ,
                'subSalaryId' => 1,
                'subHomeFurnitureId' => 5,
                'subFamilyMemberId' => 8
            ]
        ];
        
        foreach ($data as $value) {
            Property::create($value);
        }
    }
}
