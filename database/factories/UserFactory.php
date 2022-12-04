<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'middlename' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail(),
            'photo' => $resource,
            'phone' => $this->faker->phoneNumber,
            'code' => time(),
            'email_verified_at' => now(),
            'password' => 'password', // password
            'remember_token' => Str::random(10),
            //'store_id' => Store::factory()->create()->id
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
