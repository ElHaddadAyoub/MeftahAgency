<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ville extends Model
{
    protected $table = "ville";
    protected $fillable = [
        'ville', 'region'
    ];
    public function region(){
        return $this->belongsTo(region::class,'region');
     }
}
