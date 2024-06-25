<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $post = collect($this->faker->paragraphs(rand(2, 5)))
        //     ->map(function ($item) {
        //         return "<p>$item</p>";
        //     })->toArray();
        // $post = implode($post);


        // $title['en'] = "eCommerce Marketing";
        // $title['id'] = "التجارة الإلكترونية";

        return [
            // 'title' => $title,
            // 'excerpt_en' => $this->faker->sentence,
            // 'excerpt_id' => "تشير التجارة الإلكترونية ببساطة إلى المعاملات التي يقوم فيها الأفراد والشركات ببيع أو شراء المنتجات عبر الإنترنت.",
            // 'category_id' => $this->faker->numberBetween(1, 4),
            // 'content_en' => $post,
            // 'content_id' => "تشير التجارة الإلكترونية ببساطة إلى المعاملات التي يقوم فيها الأفراد والشركات ببيع أو شراء المنتجات عبر الإنترنت.",
            // 'reads' => $this->faker->numberBetween(100, 10000),
            // 'time_read' => $this->faker->unique()->numberBetween(5, 100),
        ];
    }
}
