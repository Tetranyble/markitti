<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPreferences>
 */
class UserPreferencesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'want_news_letter' => $this->faker->randomElement([false, true]),
            'want_sms_notification' => $this->faker->randomElement([true, false]),
            'user_id' => User::factory()->create()->id
        ];
    }
}
