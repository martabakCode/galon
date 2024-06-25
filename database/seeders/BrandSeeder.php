<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => [
                    'en' => 'Aqua',
                    'id' => 'Aqua',
                ],
                'description_en' => 'Aqua Natural Mineral Water',
                'description_id' => 'Air Mineral Murni Aqua',
            ],
            [
                'name' => [
                    'en' => 'Le Mineral',
                    'id' => 'Le Mineral',
                ],
                'description_en' => 'Lemineral Mineral Water',
                'description_id' => 'Air Mineral Lemineral',
            ],
            [
                'name' => [
                    'en' => 'Club',
                    'id' => 'Club',
                ],
                'description_en' => 'Club Mineral Water',
                'description_id' => 'Air Mineral Club',
            ],
            [
                'name' => [
                    'en' => 'Cleo',
                    'id' => 'Cleo',
                ],
                'description_en' => 'Cleo Mineral Water',
                'description_id' => 'Air Mineral Cleo',
            ],
        ];

        foreach ($brands as $brandData) {
            $name = $brandData['name'];
            $brand = [
                'name' => $name, // Menggunakan 'en' untuk bahasa Inggris
                'description_en' => $brandData['description_en'],
                'description_id' => $brandData['description_id'],
            ];
            Brand::create($brand);
        }

    }
}
