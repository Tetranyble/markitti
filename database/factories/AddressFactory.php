<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'store_id' => Store::factory()->create()->id,
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'delivery_address' => $this->faker->address,
            'delivery_info' => $this->faker->sentence,
            'region' => $this->faker->country,
            'city' => $this->faker->city,
            'mobile_phone' => $this->faker->phoneNumber,
            'home_phone' => $this->faker->phoneNumber,
            'is_default' => $this->faker->boolean,
        ];
    }
}
