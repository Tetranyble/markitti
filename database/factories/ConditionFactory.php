<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Condition>
 */
class ConditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name =  app()->environment(['local', 'staging']) ? $this->faker->randomElement(['new', 'refurbish']) :
            $this->faker->unique()->randomElement(['new', 'refurbish']);
        return [
            'name' => $name,
            'description' => null
        ];
    }
}
