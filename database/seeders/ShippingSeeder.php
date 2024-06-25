<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ship1 = [
            'name' => 'Standard',
            'days' => '3-5',
            'cost' => '12000'
        ];
        Shipping::create($ship1);

        $ship2 = [
            'name' => 'Express',
            'days' => '1-2',
            'cost' => '20000'
        ];
        Shipping::create($ship2);
    }
}
