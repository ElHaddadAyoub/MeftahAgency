<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    protected $table = "article_images";
    protected $fillable = [
        'article_id', 'article_image_path', 'article_image_caption'
    ];

    public function Article(){
        return $this->belongsTo(Article::class,'article_id');
    }
}
