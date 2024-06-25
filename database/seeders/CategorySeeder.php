<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name['en'] = 'Refill Water';
        $name['id'] = 'Air Isi Ulang';
        $category = [
            'id' => 1,
            'name' => $name,
            'description_en' => 'Refill Water Category',
            'description_id' => 'Kategori Air Isi Ulang',
        ];
        Category::create($category);

        $name['en'] = 'New Gallon';
        $name['id'] = 'Air Mineral Galon';
        $category = [
            'id' => 2,
            'name' => $name,
            'description_en' => 'New Gallon Category',
            'description_id' => 'Kategori Air Mineral Baru Galon',
        ];
        Category::create($category);

        $name['en'] = 'Bottle';
        $name['id'] = 'Air Mineral Botol';
        $category = [
            'id' => 3,
            'name' => $name,
            'description_en' => 'Bottle Water Category',
            'description_id' => 'Kategori Air Mineral Botol',
        ];
        Category::create($category);

    }
}
