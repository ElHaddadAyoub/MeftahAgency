<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = "subcategory";
    protected $fillable = [
        'title', 'description', 'avatar','category_id'
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
     }
}
