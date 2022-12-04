<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $resource = $this->faker->randomElement([
            'https://harde.s3.us-east-2.amazonaws.com/cem.png',
            'https://harde.s3.us-east-2.amazonaws.com/MBA-Illo-2-1.jpg',
            'https://harde.s3.us-east-2.amazonaws.com/uiux.png',
            'https://harde.s3.us-east-2.amazonaws.com/personal-effectiveness.png',
        ]);
        return [
            'image' => $resource,
            'description' => $this->faker->paragraph,
            'store_id' => Store::factory()->create()->id,
        ];
    }
}
