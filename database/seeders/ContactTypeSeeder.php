<?php

namespace Database\Seeders;

use App\Models\ContactType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactType::create([
            'type' => 'quote',
            'description' => 'quote contact'
        ]);

        ContactType::create([
            'type' => 'enquiry',
            'description' => 'enquiry quote'
        ]);
        ContactType::create([
            'type' => 'general',
            'description' => 'general contact'
        ]);
    }
}
