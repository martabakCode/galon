<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shipping_address = [
            'street' => 'No. 14, Surabaya street',
            'country' => 'Indonesia',
            'state' => '',
            'city' => 'IBB',
            'post_code' => '40400',
        ];
        $orders = [
            [
                'code' => date('Y') . date('m') . date('d') . '00001',
                'user_id' => 1,
                'payment_id' => 1,
                'shipping_id' => 1,
                'shipping_cost' => 5,
                'shipping_address' => json_encode($shipping_address),
                'subtotal' => '155000',
                'total' => '150000',
                'email' => 'customer@example.com',
                'phone' => '001111111',
                'status_id' => 2,
            ],
            [
                'code' => date('Y') . date('m') . date('d') . '00002',
                'user_id' => 2,
                'payment_id' => 2,
                'shipping_id' => 2,
                'shipping_cost' => 10,
                'shipping_address' => json_encode($shipping_address),
                'subtotal' => '90000',
                'total' => '100000',
                'email' => 'orders@Galon Mart.net',
                'phone' => '0022222222',
                'status_id' => 2,
            ],
            [
                'code' => date('Y') . date('m') . date('d') . '00003',
                'user_id' => 2,
                'payment_id' => 1,
                'shipping_id' => 2,
                'shipping_cost' => 10,
                'shipping_address' => json_encode($shipping_address),
                'subtotal' => '40000',
                'total' => '50000',
                'email' => '',
                'phone' => '',
                'status_id' => 1,
            ],
        ];
        foreach ($orders as $order) {
            Order::create($order);
        }

    }
}
