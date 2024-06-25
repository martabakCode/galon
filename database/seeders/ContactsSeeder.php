<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact1 = [
            'first_name' => 'Pengelola',
            'last_name' => 'Galon',
            'email' => 'najib@GalonMart.com',
            'phone' => '01111111111',
            'subject' => 'Bangun situs web baru',
            'message' => 'Saya ingin membangun situs web baru untuk e-commerce dengan beberapa kustomisasi dan fitur baru.',
            'ip' => '192.168.0.1',
            'is_read' => 1,
        ];
        Contact::create($contact1);

        $contact2 = [
            'first_name' => 'User',
            'last_name' => 'Galon',
            'email' => 'customer@gmail.com',
            'phone' => '022222222222',
            'subject' => 'Apakah situs web Anda mendukung RTL?',
            'message' => 'Saya ingin membeli template situs web Anda dan menanyakan apakah itu mendukung RTL? Apakah itu juga responsif?',
        ];
        Contact::create($contact2);

    }
}
