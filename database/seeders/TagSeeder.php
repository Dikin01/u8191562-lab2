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
        TagFactory::times(100)->create();
    }
}
