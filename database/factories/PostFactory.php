<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'content' => fake()->text(200),
            'publish_date_time' => fake()->dateTime(),
            'status' => rand(0, 1) ? 'Archive' : 'Publish'
        ];
    }
}
