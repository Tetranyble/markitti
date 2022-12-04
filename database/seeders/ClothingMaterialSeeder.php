<?php

namespace Database\Seeders;

use App\Models\ClothingMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClothingMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClothingMaterial::factory(19)->create();
    }
}
