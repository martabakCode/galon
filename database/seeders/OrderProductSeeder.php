<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_products = [
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 3,
                'price' => '45.00',
            ],
        ];
        foreach ($order_products as $op)
            OrderProduct::create($op);
    }
}
