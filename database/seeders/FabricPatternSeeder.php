<?php

namespace Database\Seeders;

use App\Models\FabricPattern;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FabricPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FabricPattern::factory(18)->create();
    }
}
