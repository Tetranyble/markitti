<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resource>
 */
class ResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $resources = $this->faker->randomElement([
//            ['mime' => 'video/mp4', 'path' => 'https://harde.s3.us-east-2.amazonaws.com/1+What+do+i+need.mp4'],
            ['mime' => 'image/jpg', 'path' => 'https://harde.s3.us-east-2.amazonaws.com/MBA-Illo-2-1.jpg'],
//            ['mime' => 'video/mp4', 'path' => 'https://harde.s3.us-east-2.amazonaws.com/3+Bootstrap+a+Vue+3+app.mp4'],
            ['mime' => 'image/jpg', 'path' => 'https://harde.s3.us-east-2.amazonaws.com/MBA-Illo-2-1.jpg'],
            ['mime' => 'image/png', 'path' => 'https://harde.s3.us-east-2.amazonaws.com/personal-effectiveness.png'],
            ['mime' => 'image/png', 'path' => 'https://harde.s3.us-east-2.amazonaws.com/uiux.png'],
            ['mime' => 'image/png', 'path' => 'https://harde.s3.us-east-2.amazonaws.com/cem.png'],
        ]);

        return [

            'type' => $resources['mime'],
            'filename' => $resources['path'],
            'extension' => $this->faker->fileExtension(),
            'size' => $this->faker->randomDigit(),
            'store_id' => Store::factory()->create()->id,
            'is_banner' => $this->faker->randomElement([false, true]),
        ];
    }
}
