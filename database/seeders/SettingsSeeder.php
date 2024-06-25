<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slides = array(
            "slider/slider1.jpg",
            "slider/slider2.jpg",
            "slider/slider3.jpg",
            "slider/slider4.jpg",
        );

        $settings = [
            [
                'name' => 'name_en',
                'value' => 'Galonmart',
            ],
            [
                'name' => 'name_id',
                'value' => 'Galonmart',
            ],
            [
                'name' => 'description_en',
                'value' => 'eCommerce website, multilingual, build with top-notch technology. Copyright: Galonmart',
            ],
            [
                'name' => 'description_id',
                'value' => 'Toko online multibahasa, dibangun dengan teknologi terbaik. Hak cipta: Galonmart',
            ],
            [
                'name' => 'keywords_en',
                'value' => 'Galonmart, eCommerce website, multilingual, Galonmart, Galonmart, Indonesia, Kuala Lumpor',
            ],
            [
                'name' => 'keywords_id',
                'value' => 'Toko,Toko Galon produk bervariasi, Indonesia, Jakarta',
            ],

            [
                'name' => 'email',
                'value' => 'contact@galonmart.con',
            ],
            [
                'name' => 'contact',
                'value' => '+62-898-555-033',
            ],
            [
                'name' => 'country_en',
                'value' => 'Indonesia',
            ],
            [
                'name' => 'country_id',
                'value' => 'Jakarta',
            ],
            [
                'name' => 'city_en',
                'value' => 'Jakarta',
            ],
            [
                'name' => 'city_id',
                'value' => 'Jakarta',
            ],
            [
                'name' => 'post_code',
                'value' => '53000',
            ],
            [
                'name' => 'logo_en',
                'value' => 'Galonmart-red.png',
            ],
            [
                'name' => 'logo_id',
                'value' => 'Galonmart-red-ar.png',
            ],
            [
                'name' => 'logo_transparent_en',
                'value' => 'Galonmart-white.png',
            ],
            [
                'name' => 'logo_transparent_id',
                'value' => 'Galonmart-white-ar.png',
            ],
            [
                'name' => 'icon',
                'value' => 'favicon.png',
            ],
            [
                'name' => 'currency_en',
                'value' => 'IDR',
            ],
            [
                'name' => 'currency_id',
                'value' => 'IDR',
            ],
            [
                'name' => 'layout',
                'value' => 'basic',
            ],
            [
                'name' => 'whatsapp',
                'value' => '+62-898-555-033',
            ],
            [
                'name' => 'facebook',
                'value' => 'https://facebook/',
            ],
            [
                'name' => 'twitter',
                'value' => 'https://twitter/',
            ],
            [
                'name' => 'youtube',
                'value' => 'https://youtube/',
            ],
            [
                'name' => 'instagram',
                'value' => 'https://instagram/Galonmart',
            ],
            [
                'name' => 'slider_images',
                'value' => json_encode($slides),
            ],
            [
                'name' => 'category_max_items',
                'value' => '8',
            ],
            [
                'name' => 'category_row_cells',
                'value' => '4',
            ],
            [
                'name' => 'trending_max_items',
                'value' => '8',
            ],
            [
                'name' => 'copy_right_en',
                'value' => 'Galonmart. All rights reserved.',
            ],
            [
                'name' => 'copy_right_id',
                'value' => 'Galonmart. All rights reserved',
            ],
            [
                'name' => 'branches',
                'value' => json_encode([
                    [
                        'name' => 'Indonesia, Ibb',
                        'address' => 'Kantor pusat, Jalan Surabaya, Ibb, Yaman',
                        'contact' => '+62-878-555-972',
                        'email' => 'jakarta@galonmart.com',
                    ],
                    [
                        'name' => 'Indonesia, Surabaya',
                        'address' => 'Cabang Surabaya, Jalan Imam Bonjol, Surabaya',
                        'contact' => '+62-878-555-074',
                        'email' => 'surabaya@galonmart.com',
                    ],
                    [
                        'name' => 'Indonesia, Semarang',
                        'address' => 'Cabang Semarang, Jalan Mawar, Yaman',
                        'contact' => '+62-817-555-322',
                        'email' => 'semarang@galonmart.com',
                    ],
                    [
                        'name' => 'Indonesia, Bandung',
                        'address' => 'Cabang Bandung, Jalan Soekarno Hatta, Bandung',
                        'contact' => '+62-856-555-028',
                        'email' => 'bandung@galonmart.com',
                    ],
                ]),
            ],
        ];
        Setting::insert($settings);

    }
}
