<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagArticle extends Model
{
    protected $table = 'tags_articles';

    public function tag () {
        return $this->belongsTo(\App\Tag::class);
    }

    public function article () {
        return $this->belongsTo(\App\Article::class);
    }
}
