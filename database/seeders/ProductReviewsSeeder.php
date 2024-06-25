<?php

namespace Database\Seeders;

use App\Models\ProductReview;
use Illuminate\Database\Seeder;

class ProductReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prs = [
            [
                'product_id' => 1,
                'user_id' => 1,
                'stars' => 5,
                'comment' => 'Good product',
            ],

            [
                'product_id' => 1,
                'user_id' => 2,
                'stars' => 4,
                'comment' => 'Very tasty and healthy honey',
            ],
        ];
        foreach ($prs as $pr) {
            ProductReview::create($pr);
        }

    }
}