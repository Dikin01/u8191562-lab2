<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\TagFactory;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleFactory::times(100)->create();
        TagFactory::times(100)->create();

        $articles = Article::all();

        Tag::all()->each(function ($tag) use ($articles) {
            $tag->articles()->attach(
                $articles->random(rand(0, 10))->pluck('id')->toArray()
            );
        });
    }
}
