<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClothingMaterial>
 */
class ClothingMaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = app()->environment(['local', 'staging']) ?
            $this->faker->randomElement(['Ankara', 'Bambo', 'Brocade', 'Cliffon', 'Cordmony', 'Cotton', 'Crepe',
                'Damask', 'Denim', 'Fur', 'Jacquard', 'Jersey', 'Lace', 'Leather', 'Linen', 'Lycra', 'Mesh', 'Metallic','Net']) :
            $this->faker->unique()->randomElement(['Ankara', 'Bamboo', 'Brocade', 'Cliffon', 'Cordmony', 'Cotton', 'Crepe',
                'Damask', 'Denim', 'Fur', 'Jacquard', 'Jersey', 'Lace', 'Leather', 'Linen', 'Lycra', 'Mesh', 'Metallic','Net']);
        return [
            'name' => $name
        ];
    }
}
