<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $blog_title = fake()->title();

        return [
            'blog_title' => $blog_title,
            'blog_slug'  => Str::slug($blog_title),
            'blog_text'  => fake()->text(),
        ];
    }
}
