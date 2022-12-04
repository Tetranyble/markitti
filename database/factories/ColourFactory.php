<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colour>
 */
class ColourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = app()->environment(['local', 'staging']) ?
            $this->faker->randomElement(['beige', 'black', 'blue', 'bronze', 'brown', 'gold', 'gray', 'multicolor',
                'not applicable', 'orange', 'others', 'pink', 'purple', 'red', 'silver', 'white', 'yellow']) :
            $this->faker->unique()->randomElement(['beige', 'black', 'blue', 'bronze', 'brown', 'gold', 'gray', 'multicolor',
                'not applicable', 'orange', 'others', 'pink', 'purple', 'red', 'silver', 'white', 'yellow']);
        return [
            'name' => $name,
        ];
    }
}
