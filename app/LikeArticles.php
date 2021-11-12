<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeArticles extends Model
{




    public function articles()
    {
        $this->belongsToMany(Article::class , 'article_id');
    }
}
