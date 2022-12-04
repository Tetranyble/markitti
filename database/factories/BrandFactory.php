<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = app()->environment(['local', 'staging']) ? $this->faker->randomElement(['unbranded','Samsung', 'LG', 'Apple']) :
            $this->faker->unique()->randomElement(['unbranded','Samsung', 'LG', 'Apple']);
        return [
            'name' => $name
        ];
    }
}
