<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_Post>
 */
class ProductPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id ' => fake()->name(),
            'subcategory_id ' => fake()->name(),
            'user_id ' => fake()->name(),
            'title' => fake()->name(),
            'slug' => fake()->name(),
            'post_date' => fake()->iso8601($max = 'now'),
            'image' => fake()->imageUrl($width = 640, $height = 480),
            'description' => fake()->name(),
            'tags' => fake()->name(),
            'status' => fake()->name(),
        ];
    }
}
