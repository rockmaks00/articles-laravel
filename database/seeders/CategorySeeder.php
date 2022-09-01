<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Генерирует 5 основных категорий с потомками до 2 уровня вложенности
        Category::factory()
            ->count(5)
            ->create()->each(
                function (Category $root) {
                    $root->children()
                        ->saveMany(Category::factory()
                            ->count(random_int(2, 5))
                            ->create()->each(
                                function (Category $child) {
                                    $child->children()
                                        ->saveMany(Category::factory()
                                            ->count(random_int(0, 5))
                                            ->create());
                                }
                            ));
                }
            );
    }
}
