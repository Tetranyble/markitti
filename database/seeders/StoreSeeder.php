<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'name' => 'Our test store',
            'server' => Str::slug('Our test store'),
            'description' => 'The quick brown fox store that sales nothing apparently.',
        ])->domains()->create([
        'domain' => 'store',
        ]);
    }
}
