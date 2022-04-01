<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index () {
        $articles = Article::latest()->paginate(10);
        $tags = Tag::all();
        return view('pages.articles', compact('articles', 'tags'));
    }

    public function show ($slug) {
        $article = Article::where('slug', $slug)->first();
        $tags = $article->tags;
        return view('pages.article', compact('article', 'tags'));
    }
}
