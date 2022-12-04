<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageFeature;
use App\Models\PageType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageType::factory()->create([
            'name' => 'Home',
            'slug' => 'home'
        ])->each(function ($type){
            Page::factory(3)->create(['store_id' => 1])->each(function($page){
                PageFeature::factory(3)->create(['page_id' => $page->id]);
            });
        });
    }
}
