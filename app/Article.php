<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function tags () {
        return $this->hasMany(TagArticle::class)->with('tag');
    }

    public function comments() {
        return $this->hasMany(Comment::class)
            ->orderBy('id', 'desc');
    }
}
