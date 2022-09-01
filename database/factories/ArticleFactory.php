<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(),
            'image' => fake()->imageUrl(width: 640, height: 320, category: 'article'),
            'preview' => fake()->text(),
            'text' => fake()->text(maxNbChars: 2000),
            'author_id' => Author::all()->random()->id,
        ];
    }
}
