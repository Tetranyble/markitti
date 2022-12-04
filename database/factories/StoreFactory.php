<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\StoreType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->word;
        $server = Str::slug($name);
        return [
            'store_type_id' => StoreType::factory()->create()->id,
            'name' => $name,
            'logo' => $this->faker->image,
            'favicon' => $this->faker->image,
            'description' => $this->faker->paragraph,
            'server' => $server.env('APP_URL'),
            'seo_key_words' => $this->faker->sentence,
            'explore' => $this->faker->sentence,
            'short_description' => $this->faker->sentence,
            'twitter' => $this->faker->url,
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'linkedin' => $this->faker->url,
            'code' => now()->timestamp,
            'is_active' => $this->faker->randomElement([false, true]),
        ];
    }
}
