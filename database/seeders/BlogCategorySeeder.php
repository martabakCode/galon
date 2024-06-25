<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name['en'] = 'Main';
        $name['id'] = 'Utama';
        $category =
            [
                'id' => 1,
                'name' => $name,
                'description_en' => 'Main Category',
                'description_id' => 'Kategori Utama',
            ];
        BlogCategory::create($category);

        $name['en'] = 'News';
        $name['id'] = 'Berita';
        $category =
            [
                'id' => 2,
                'name' => $name,
                'description_en' => 'Our latest news',
                'description_id' => 'Berita terbaru kami',
            ];
        BlogCategory::create($category);

        $name['en'] = 'Products';
        $name['id'] = 'Produk';
        $category =
            [
                'id'   => 3,
                'name' => $name,
                'description_en' => 'Products news',
                'description_id' => 'Berita produk',
            ];
        BlogCategory::create($category);

        $name['en'] = 'Ads';
        $name['id'] = 'Iklan';
        $category =
            [
                'id'   => 4,
                'name' => $name,
                'description_en' => 'Ads, events, and promotions',
                'description_id' => 'Iklan, acara, dan promosi',
            ];
        BlogCategory::create($category);
    }
}
