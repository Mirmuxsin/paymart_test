<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index ($slug) {
        $tag = Tag::where('slug', $slug)->first();
        $articles = $tag->articles()->paginate(10);
        return view('pages.tag', compact('tag', 'articles'));
    }
}
