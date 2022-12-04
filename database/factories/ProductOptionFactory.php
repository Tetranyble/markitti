<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductOption>
 */
class ProductOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => $this->faker->numberBetween(2000, 100000),
            'size' => $this->faker->word,
            'supplier_sku' => $this->faker->word,
            'total' => $this->faker->numberBetween(2000, 100000),
            'quantity' => $this->faker->numberBetween(100, 5000),
            'product_id' => Product::factory()->create()->id
        ];
    }
}
