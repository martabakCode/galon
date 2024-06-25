<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $name['en'] = 'Aqua Refillable Gallon';
        $name['id'] = 'Galon Aqua Isi Ulang';
        $product =
            [
            'id' => 1,
            'name' => $name,
            'category_id' => 1,
            'brand_id' => 1,
            'excerpt' => 'Premium refillable Aqua gallon from one of the best water sources',
            'stock' => 5,
            'price' => 20000,
            'buy_price' => 15000,
            'description' => 'Premium refillable Aqua gallon from one of the best water sources',
        ];
        Product::create($product);

        $name['en'] = 'Le Mineral Refillable Gallon';
        $name['id'] = 'Galon Le Mineral Isi Ulang';
        $product =
            [
            'id' => 2,
            'name' => $name,
            'category_id' => 1,
            'brand_id' => 2,
            'excerpt' => 'Le Mineral grade refillable mineral water gallon from one of the best water sources',
            'stock' => 5,
            'price' => 21000,
            'buy_price' => 16000,
            'description' => 'Le Mineral grade refillable mineral water gallon from one of the best water sources',
        ];
        Product::create($product);

        $name['en'] = 'Club Refillable Gallon';
        $name['id'] = 'Galon Club Isi Ulang';
        $product =
            [
            'id' => 3,
            'name' => $name,
            'category_id' => 1,
            'brand_id' => 3,
            'excerpt' => 'Club grade refillable mineral water gallon from one of the best water sources',
            'stock' => 5,
            'price' => 19000,
            'buy_price' => 12000,
            'description' => 'Club grade refillable mineral water gallon from one of the best water sources',
        ];
        Product::create($product);

        $name['en'] = 'Cleo Refillable Gallon';
        $name['id'] = 'Galon Cleo Isi Ulang';
        $product =
            [
            'id' => 4,
            'name' => $name,
            'category_id' => 1,
            'brand_id' => 4,
            'excerpt' => 'Cleo grade refillable mineral water gallon from one of the best water sources',
            'stock' => 5,
            'price' => 25000,
            'buy_price' => 20000,
            'description' => 'Cleo grade refillable mineral water gallon from one of the best water sources',
        ];

        Product::create($product);

        $name['en'] = 'Aqua Gallon';
        $name['id'] = 'Galon Aqua';
        $product =
            [
            'id' => 5,
            'name' => $name,
            'category_id' => 2,
            'brand_id' => 1,
            'excerpt' => 'Aqua mineral water gallon with a refreshing taste',
            'stock' => 5,
            'price' => 20000,
            'buy_price' => 15000,
            'description' => 'Aqua mineral water gallon with a refreshing taste',
        ];
        Product::create($product);

        $name['en'] = 'Le Mineral Water Gallon';
        $name['id'] = 'Galon Air Mineral Le Mineral';
        $product =
            [
            'id' => 6,
            'name' => $name,
            'category_id' => 2,
            'brand_id' => 2,
            'excerpt' => 'Le Minerale mineral water gallon with a refreshing taste',
            'stock' => 5,
            'price' => 23000,
            'buy_price' => 20000,
            'description' => 'Le Minerale mineral water gallon with a refreshing taste',
        ];
        Product::create($product);

        $name['en'] = 'Club Gallon';
        $name['id'] = 'Galon Air Mineral Club';
        $product =
            [
            'id' => 7,
            'name' => $name,
            'category_id' => 2,
            'brand_id' => 3,
            'excerpt' => 'Club mineral water gallon with a refreshing taste',
            'stock' => 5,
            'price' => 22000,
            'buy_price' => 19000,
            'description' => 'Club mineral water gallon with a refreshing taste from one of the best water sources',
        ];
        Product::create($product);

        $name['en'] = 'Cleo Gallon';
        $name['id'] = 'Galon Air Mineral Cleo';
        $product =
            [
            'id' => 8,
            'name' => $name,
            'category_id' => 2,
            'brand_id' => 4,
            'excerpt' => 'Cleo mineral water gallon with a refreshing taste',
            'stock' => 5,
            'price' => 25000,
            'buy_price' => 18000,
            'description' => 'Cleo mineral water gallon with a refreshing taste from one of the best water sources',
        ];
        Product::create($product);
    }
}
