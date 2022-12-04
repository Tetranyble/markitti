<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PageFeature>
 */
class PageFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'icon' => 'assets/images/icons/return-svg.svg',
            'name' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'page_id' => Page::factory()->create()->id
        ];
    }
}
