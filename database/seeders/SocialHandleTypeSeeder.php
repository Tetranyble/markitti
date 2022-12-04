<?php

namespace Database\Seeders;

use App\Models\SocialHandleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialHandleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialHandleType::create(['name' =>'twitter', 'icon' => 'fa fa-twitter']);
        SocialHandleType::create(['name' =>'facebook', 'icon' => 'fa fa-facebook']);
        SocialHandleType::create(['name' =>'instagram', 'icon' => 'fa fa-instagram']);
        SocialHandleType::create(['name' =>'linkedin', 'icon' => 'fa fa-linkedin']);
    }
}
