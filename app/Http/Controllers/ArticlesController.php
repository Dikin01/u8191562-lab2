<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterTitle = $request->query('name');
        $filterSymbolCode = $request->query('symbolcode');
        $filterTag = $request->query('tags');

        $articles = Article::where('articles.name', 'like', '%' . $filterTitle . '%')
            ->where('articles.symbolcode', 'like', '%' . $filterSymbolCode . '%')
            ->whereHas('tags', function ($tag) use ($filterTag) {
                $tag->where('name', 'like', '%' . $filterTag . '%');
            })
            ->paginate(15);   

        
        
        $tags = Tag::all();

        return view('posts', ['articles' => $articles, 'tags' => $tags]);
    }
       
    public function getArticle($id){

        $articles = Article::where('id', '=', $id)->get();
        $article = null;
        if(count($articles) > 0)
            $article = $articles[0];

        $tags = Tag::join('article_tag',function($join){
            $join->on('tags.id', '=', 'article_tag.tag_id');
        })->where('article_tag.article_id','=', $id)->orderBy('name')->get();

        
        return view('post', ['article' => $article, 'tags' => $tags]);
    }

}