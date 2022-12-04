<?php

namespace Database\Seeders;

use App\Models\ClothingMaterial;
use App\Models\Condition;
use App\Models\ContactType;
use App\Models\Gender;
use App\Models\PageType;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment(['local', 'staging'])){
            $this->call(StoreSeeder::class);
            //$this->call(ProductSeeder::class);
            $this->call(RoleSeeder::class);
            $this->call(PermissionSeeder::class);
            $this->call(UserSeeder::class);
            //$this->call(StoreTypeSeeder::class);
            $this->call(ContactTypeSeeder::class);
            $this->call(PageTypeSeeder::class);
            $this->call(SocialHandleTypeSeeder::class);
        }else{
            $this->call(PermissionSeeder::class);
            $this->call(Gender::class);
            $this->call(ColourSeeder::class);
            $this->call(FabricPatternSeeder::class);
            $this->call(ClothingMaterialSeeder::class);
            $this->call(ConditionSeeder::class);
            $this->call(BrandSeeder::class);
            $this->call(PageTypeSeeder::class);
        }

    }
}
