<?php

namespace Database\Seeders;

use App\Models\BlogTag;
use Illuminate\Database\Seeder;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => [
                    'en' => 'Marketing',
                    'id' => 'Pemasaran',
                ],
            ],
            [
                'name' => [
                    'en' => 'Indonesia',
                    'id' => 'Yaman',
                ],
            ],
            [
                'name' => [
                    'en' => 'Galon Mart',
                    'id' => 'Galon Mart',
                ],
            ],
            [
                'name' => [
                    'en' => 'Trading',
                    'id' => 'Perdagangan',
                ],
            ],
            [
                'name' => [
                    'en' => 'Money',
                    'id' => 'Uang',
                ],
            ],
            [
                'name' => [
                    'en' => 'Business',
                    'id' => 'Bisnis',
                ],
            ],
            [
                'name' => [
                    'en' => 'Shipping',
                    'id' => 'Pengiriman',
                ],
            ],
            [
                'name' => [
                    'en' => 'Software',
                    'id' => 'Perangkat Lunak',
                ],
            ],
            [
                'name' => [
                    'en' => 'Services',
                    'id' => 'Layanan',
                ],
            ],
            [
                'name' => [
                    'en' => 'Transportation',
                    'id' => 'Transportasi',
                ],
            ],
        ];

        foreach ($tags as $tag) {
            BlogTag::create($tag);
        }
    }
}
