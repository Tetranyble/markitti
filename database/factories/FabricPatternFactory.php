<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FabricPattern>
 */
class FabricPatternFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = app()->environment(['local', 'staging']) ?
            $this->faker->randomElement(['Abstract/Geometric', 'Animal', 'Argyle', 'Camouflage', 'Chevron',
                'Cross', 'Damask', 'Floral', 'Flourish', 'Folage', 'Hearts', 'Herigbone', 'houndstooth', 'multiple pattern',
                'others', 'paisley', 'pattern', 'plaids/checks']) :
            $this->faker->unique()->randomElement(['Abstract/Geometric', 'Animal', 'Argyle', 'Camouflage', 'Chevron',
                'Cross', 'Damask', 'Floral', 'Flourish', 'Folage', 'Hearts', 'Herigbone', 'houndstooth', 'multiple pattern',
                'others', 'paisley', 'pattern', 'plaids/checks']);
        return [
            'name' => $name
        ];
    }
}
