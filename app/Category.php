<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $fillable = [
        'title', 'bio', 'avatar'
    ];
    public function Subcategory()
    {
        return $this->hasMany(Subcategory::class,'id');
    }
}
