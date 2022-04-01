<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home () {
        $articles = Article::latest()->take(6)->get();
        return view('pages.home', compact('articles'));
    }
}
