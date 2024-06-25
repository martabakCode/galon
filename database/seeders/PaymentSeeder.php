<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pays = [
            [
                'name' => 'PayPal',
                'auth_code' => '',
                'email' => 'paypal@email.com',
            ],
            [
                'name' => 'Credit card',
                'auth_code' => 'xxxxxx',
                'email' => '',
            ],
            [
                'name' => 'eTransfer',
                'auth_code' => '',
                'email' => '',
            ]
        ];

        Payment::insert($pays);
    }
}