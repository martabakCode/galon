<?php

namespace Database\Seeders;

use App\Models\ProductDisplay;
use Illuminate\Database\Seeder;

class ProductDisplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'product_id' => 1,
                'new' => 1,
                'featured' => 0,
                'promotion' => 0,
            ],
            [
                'product_id' => 2,
                'new' => 1,
                'featured' => 0,
                'promotion' => 0,
            ],
            [
                'product_id' => 3,
                'new' => 1,
                'featured' => 0,
                'promotion' => 0,
            ],
            [
                'product_id' => 4,
                'new' => 1,
                'featured' => 0,
                'promotion' => 0,
            ],
            [
                'product_id' => 4,
                'new' => 1,
                'featured' => 0,
                'promotion' => 0,
            ],
            [
                'product_id' => 5,
                'new' => 0,
                'featured' => 0,
                'promotion' => 1,
            ],
            [
                'product_id' => 6,
                'new' => 0,
                'featured' => 0,
                'promotion' => 1,
            ],
            [
                'product_id' => 7,
                'new' => 0,
                'featured' => 0,
                'promotion' => 1,
            ],
            [
                'product_id' => 8,
                'new' => 0,
                'featured' => 0,
                'promotion' => 1,
            ],
        ];
        foreach ($products as $op) {
            ProductDisplay::create($op);
        }

    }
}
