<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{

    use SoftDeletes;
    use Sluggable;
    protected $fillable = [

        'title' ,
        'slug',
        'user_id',
        'content',
        'image_path',

    ];


    protected $dates = ['delted_at'];

    public function user(){

        return $this->belongsto(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function categories(){


        return $this->belongsToMany(Category::class , 'article_categories' , 'article_id' , 'category_id');


    }
    public function comments()
    {
        return $this->hasMany(comment::class , 'article_id');

    }


}
