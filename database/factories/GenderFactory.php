<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gender>
 */
class GenderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = app()->environment(['local', 'staging']) ?
            $this->faker->randomElement(['Boys', 'Male', 'Girls', 'Female', 'Unisex']) :
            $this->faker->unique()->randomElement(['Boys', 'Male', 'Girls', 'Female', 'Unisex']);

        return [
            'name' => $name,
            'description' => null
        ];
    }
}
