<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory(60)->create()->each(function ($article) {
            $categories = Category::all()->random(rand(1, 3));
            $article->categories()->attach($categories);
        });
    }
}