<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\ClothingMaterial;
use App\Models\Colour;
use App\Models\Condition;
use App\Models\FabricPattern;
use App\Models\Gender;
use App\Models\Image;
use App\Models\Page;
use App\Models\PageFeature;
use App\Models\Phone;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\Recognition;
use App\Models\ReturnPolicy;
use App\Models\Role;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\User;
use App\Models\UserPreferences;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StoreTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StoreType::factory()->create()->each(function($type){
            Store::factory()->create(['store_type_id' => $type->id])->each(function ($store){
                User::factory(2)->create(['store_id' => $store->id])->each(function ($user){
                    UserPreferences::factory()->create(['user_id' => $user->id]);
                    Role::factory()->create([
                        'name' => 'user',
                        'label' => 'User'
                    ]);
                    $user->assignRole('user');
                });
                //Store recognition from different company
                Recognition::factory(4)->create(['store_id' => $store->id]);
                //company contact number
                $store->phones()->create(Phone::factory()->raw(['store_id' => $store->id]));

                Page::factory(10)->create(['store_id' => $store->id])->each(function ($page) use($store){

                    $page->images()->create(Image::factory()->raw(['store_id' => $store->id]));
                    PageFeature::factory(5)->create(['page_id' => $page->id]);
                });
                $store->domains()->create([
                    'domain' => Str::slug($store->name),
                ]);

                $brand = Brand::factory()->create();

                $policy = ReturnPolicy::factory()->create();
                $colour = Colour::factory()->create();
                $productOption = ProductOption::factory()->create();
                $fabric = FabricPattern::factory()->create();
                $gender = Gender::factory()->create();
                $condition = Condition::factory()->create();
                $clothing = ClothingMaterial::factory()->create();
                Product::factory()->create([
                    'brand_id' => $brand->id,
                    'return_policy_id' => $policy->id,
                    'colour_id' => $colour->id,
                    'product_option_id' => $productOption->id,
                    'fabric_pattern_id' => $fabric->id,
                    'gender_id' => $gender->id,
                    'condition_id' => $condition->id,
                    'clothing_material_id' => $clothing->id,
                    'store_id' => $store->id])->each(function ($product){
                    ProductOption::factory()->create(['product_id' => $product->id]);
                });
            });
        });
    }
}
