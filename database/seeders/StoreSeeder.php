<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ClothingMaterial;
use App\Models\Colour;
use App\Models\Condition;
use App\Models\FabricPattern;
use App\Models\Gender;
use App\Models\Page;
use App\Models\PageFeature;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\Resource;
use App\Models\ReturnPolicy;
use App\Models\Role;
use App\Models\Store;
use App\Models\StoreType;
use App\Models\User;
use App\Models\UserPreferences;
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

        $type = StoreType::factory()->create([
            'name' => 'classic',
            'slug' => 'classic'
        ]);
        Store::factory()->create(['store_type_id' => $type->id])->each(function ($store){
            $store->domains()->create([
                'domain' => 'store',
            ]);

            Page::factory(5)->create(['store_id' => $store->id])->each(function($page){
                PageFeature::factory(3)->create(['page_id' => $page->id]);
            });
            User::factory()->create([
                'email' => 'store@markitti.com',
                'password' => 'ugbanawaji',
                'store_id' => $store->id,
            ])->each(function ($user) {
                UserPreferences::factory()->create(['user_id' => $user->id]);
                Role::factory()->create([
                    'name' => 'admin',
                    'label' => 'Admin'
                ]);
                $user->assignRole('admin');
            });
            $brand = Brand::factory()->create();

            $policy = ReturnPolicy::factory()->create();
            $colour = Colour::factory()->create();
            $productOption = ProductOption::factory()->create();
            $fabric = FabricPattern::factory()->create();
            $gender = Gender::factory()->create();
            $condition = Condition::factory()->create();
            $clothing = ClothingMaterial::factory()->create();
            Category::factory(3)->create(['store_id' => $store->id])
                ->each(function ($category) use($brand,$policy,$colour,$productOption,$fabric,
                    $gender,$condition,$clothing,$store){
                    Product::factory(3)->create([
                        'brand_id' => $brand->id,
                        'return_policy_id' => $policy->id,
                        'colour_id' => $colour->id,
                        'product_option_id' => $productOption->id,
                        'fabric_pattern_id' => $fabric->id,
                        'gender_id' => $gender->id,
                        'condition_id' => $condition->id,
                        'clothing_material_id' => $clothing->id,
                        'store_id' => $store->id,
                        'category_id' => $category->id,
                    ])->each(function ($product) use ($store){
                        ProductOption::factory()->create(['product_id' => $product->id]);
                        Resource::factory(2)->create([
                            'store_id' => $store->id,
                            'resourceable_id' => $product->id,
                            'resourceable_type' => "App\Models\Product"
                        ]);
                        $user = User::factory()->create([ 'store_id' => $store->id ]);
                        $product->reviews()->create([
                            'comment' => 'good product',
                            'star' => 4.5,
                            'user_id' => $user->id
                        ]);
                        $product->reviews()->create([
                            'comment' => 'good product',
                            'star' => 4.0,
                            'user_id' => $user->id
                        ]);
                        $product->reviews()->create([
                            'comment' => 'good product',
                            'star' => 3.5,
                            'user_id' => $user->id
                        ]);
                        $product->reviews()->create([
                            'comment' => 'good product',
                            'star' => 3.0,
                            'user_id' => $user->id
                        ]);

                    });
            });

        });
    }
}
