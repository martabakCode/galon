<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name' => 'Pending' //not paid
            ],
            [
                'name' => 'Paid' //placed order
            ],
            [
                'name' => 'Processing'
            ],
            [
                'name' => 'Shipped'
            ],
            [
                'name' => 'Hold'
            ],
            [
                'name' => 'Cancelled'
            ],
            [
                'name' => 'Rejected'
            ],
            [
                'name' => 'Return'
            ],
            [
                'name' => 'Delivered'
            ],
            // order completed after return period
            [
                'name' => 'Completed'
            ]
        ];
        Status::insert($status);
    }
}