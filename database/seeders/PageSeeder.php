<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::factory(20)->create()->each(function($page){
            PageFeature::factory()->create(['page_id' => $page->id]);
        });
    }
}
