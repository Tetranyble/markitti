<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\ClothingMaterial;
use App\Models\Colour;
use App\Models\Condition;
use App\Models\FabricPattern;
use App\Models\Gender;
use App\Models\ProductOption;
use App\Models\ReturnPolicy;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            //'brand_id' => Brand::factory()->create()->id,
            'shipping_weight' => $this->faker->randomNumber(2),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(2000, 20000),
            'discounted_price' => $this->faker->numberBetween(2000, 20000),
//            'return_policy_id' => ReturnPolicy::factory()->create()->id,
//            'colour_id' => Colour::factory()->create()->id,
//            'product_option_id' => ProductOption::factory()->create()->id,
//            'fabric_pattern_id' => FabricPattern::factory()->create()->id,
//            'gender_id' => Gender::factory()->create()->id,
//            'condition_id' => Condition::factory()->create()->id,
//            'clothing_material_id' => ClothingMaterial::factory()->create()->id,
            'has_warranty' => $this->faker->boolean,
            'warranty_detail' => $this->faker->sentence,
            'feature' => $this->faker->sentence,
            'seo_key_word' => $this->faker->word,
            'store_id' => Store::factory()->create()->id,
            //'store_id' => Store::firstOrCreate($attributes = ['name' => 'Markitti'], Store::factory()->raw($attributes))->id
        ];
    }
}
