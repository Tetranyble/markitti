<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'name' => 'super store',
            'description' => 'The quick brown fox store that sales nothing apparently.',
        ])->domains()->create([
        'domain' => 'store.localhost',
        ]);
    }
}
