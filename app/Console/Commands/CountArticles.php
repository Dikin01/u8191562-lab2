<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CountArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tag:count {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Print count articles with tag's id";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tag_id = $this->argument('id');
        $article_count = DB::table('article_tags')->where('tag_id', '=', $tag_id)->count();
        echo "Count articles with tag's id $tag_id: $article_count\n";
        return $article_count;
    }
}
