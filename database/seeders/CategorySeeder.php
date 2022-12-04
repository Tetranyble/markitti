<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(10)->create([ 'store_id' => 1 ])->each(function ($category){
            Resource::factory(2)->create([
                'store_id' => 1,
                'resourceable_id' => $category->id,
                'resourceable_type' => "App\Models\Category"
            ]);
        });
    }
}
