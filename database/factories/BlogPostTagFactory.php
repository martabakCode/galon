<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostTag>
 */
class BlogPostTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => 1, //$this->faker->numberBetween(1, 2),
            'tag_id' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}