<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() : array
    {
        $first_name = fake()->firstName();
        $last_name = fake()->lastName();
        $patronymic = fake()->firstName();
        $avatar = random_int(0, 2) == null
            ? null : fake()->imageUrl(width: 320, height: 320, category: 'avatar');

        return [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'patronymic' => $patronymic,
            'avatar' => $avatar,
            'birth_date' => fake()->date(max: '01-01-2000'),
            'biography' => fake()->text(),
        ];
    }
}
