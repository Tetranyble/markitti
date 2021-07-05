<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Beans',
            'price' => '3000',
            'description' => 'the quick brown fox leap over the lazy dog'
        ]);
        Product::create([
            'name' => 'Rice',
            'price' => '3000',
            'description' => 'the quick brown fox leap over the lazy dog'
        ]);
        Product::create([
            'name' => 'Egg',
            'price' => '3000',
            'description' => 'the quick brown fox leap over the lazy dog'
        ]);
        Product::create([
            'name' => 'Egusi',
            'price' => '3000',
            'description' => 'the quick brown fox leap over the lazy dog'
        ]);
    }
}
