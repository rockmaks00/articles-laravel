<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Генерирует N статей с 1-3 связанными категориями
        $categories = Category::all();
        Article::factory()
            ->count(1000)
            ->create()->each(function (Article $article) use ($categories) {
                $article->categories()->attach(
                    $categories->random(random_int(1, 3))->pluck('id')->toArray());
            });
    }
}
