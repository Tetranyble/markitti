<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {

        return [
            'store_id' => Store::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
            'comment' => $this->faker->paragraph,
            'star' => $this->faker->numberBetween(1, 5)
        ];
    }
}
