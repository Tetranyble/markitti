<?php

namespace Database\Factories;

use App\Models\PageType;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
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
            'page_type_id' => PageType::factory()->create()->id,
            'detail' => $this->faker->paragraph,
            'short_description' => $this->faker->sentence,
            'store_id' => Store::factory()->create()->id,
            'is_published' => $this->faker->randomElement([true, false])
        ];
    }
}
