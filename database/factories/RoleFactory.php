<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $roles = app()->environment(['local', 'staging']) ?
            $this->faker->randomElement(['User','Super Admin','Admin', 'Editor', 'Moderator', 'Advertiser','Community Manager', 'Application']) :
            $this->faker->unique()->randomElement(['User','Super Admin','Admin', 'Editor', 'Moderator', 'Advertiser','Community Manager', 'Application']);

        return [
            'name' => Str::slug($roles),

            'label' => Str::ucfirst($roles),
            'is_system' => 1,
        ];
    }
}
