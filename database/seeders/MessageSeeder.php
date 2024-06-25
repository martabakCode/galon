<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $msg1 = [
            'user_id' => 2,
            'subject' => 'Promotion',
            'message' => 'Congratulations: You have got a promotion code (SIN200322) to be used within 3 days from now.',
            'is_read' => 1,
        ];
        Message::create($msg1);
        $msg2 = [
            'user_id' => 2,
            'subject' => 'confirm order',
            'message' => 'Please pay for order #2',
            'is_read' => 0
        ];
        Message::create($msg2);
    }
}