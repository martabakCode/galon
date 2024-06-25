<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoice1 = [
            'code' => 'INV2022-00001',
            'order_id' => 1,
        ];
        Invoice::create($invoice1);
        $invoice2 = [
            'code' => 'INV2022-00002',
            'order_id' => 2,
        ];
        Invoice::create($invoice2);
        $invoice3 = [
            'code' => 'INV2022-00003',
            'order_id' => 3,
        ];
        Invoice::create($invoice3);
    }
}