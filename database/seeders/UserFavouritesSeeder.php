<?php

namespace Database\Seeders;

use App\Models\UserFavourite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserFavouritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $favs = [
            [
                'user_id' => 1,
                'product_id' => 2
            ],
            [
                'user_id' => 2,
                'product_id' => 1
            ],
        ];

        foreach ($favs as $fav)
            UserFavourite::create($fav);
    }
}
