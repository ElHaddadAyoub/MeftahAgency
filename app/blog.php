<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = "blog";
    protected $fillable = [
        'title', 'description', 'photo','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
     }

}
