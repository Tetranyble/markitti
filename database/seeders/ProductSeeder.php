<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\ClothingMaterial;
use App\Models\Colour;
use App\Models\Condition;
use App\Models\FabricPattern;
use App\Models\Gender;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\Resource;
use App\Models\ReturnPolicy;
use App\Models\Store;
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
        ])->each(function ($product){
            ProductOption::factory(2)->create(['product_id' => $product->id]);

        });
    }
}
