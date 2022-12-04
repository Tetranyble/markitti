<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PageType>
 */
class PageTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = app()->environment(['local', 'staging']) ? $this->faker->randomElement([
            'Home', 'About Us', 'Why choose us', 'Testimony', 'Our features', 'Team member',
            'Recent projects', 'Pricing', 'Our blog', 'Others', 'Services', 'Our solution',
            'Frequently asked questions', 'Gallery', 'Get in touch', 'Privacy policy', 'Terms and conditions',
            'Career', 'Mission and value'
        ]) : $this->faker->unique()->randomElements([
            'Home', 'About Us', 'Why choose us', 'Testimony', 'Our features', 'Team member',
            'Recent projects', 'Pricing', 'Our blog', 'Others', 'Services', 'Our solution',
            'Frequently asked questions', 'Gallery', 'Get in touch', 'Privacy policy', 'Terms and conditions',
            'Career', 'Mission and value'
        ]);
        return [
            'name' => $name,
            'description' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
