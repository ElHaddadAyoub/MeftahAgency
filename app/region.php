<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    protected $table = "region";
    protected $fillable = [
        'id','region'
    ];
    public function ville()
    {
        return $this->hasMany(ville::class,'id');
    }
}
