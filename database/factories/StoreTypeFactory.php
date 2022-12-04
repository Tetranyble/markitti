<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreType>
 */
class StoreTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = app()->environment(['local', 'staging']) ?
            $this->faker->sentence :
            $this->faker->unique()->randomElement(['Classic']);

        return [
            'name' => $name,
            'description' => $this->faker->sentence,
            'slug' => $this->faker->randomDigit()
        ];
    }
}
