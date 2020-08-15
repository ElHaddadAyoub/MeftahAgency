<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Favorite;
class Article extends Model
{
    protected $table = "article";
    protected $fillable = [
        'title', 'description','prix','nb_chambre','surface','category_id','user_id','subcategory','etat','caracteristique','region_id','ville'
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
     }
     public function region(){
        return $this->belongsTo(region::class,'region_id');
     }
     public function user(){
        return $this->belongsTo(User::class,'user_id');
     }
     public function article_images(){

        return $this->hasMany(ArticleImage::class);
     }

     public function favorited()
{
    return (bool) Favorite::where('user_id', Auth::id())
                        ->where('article_id', $this->id)
                        ->first();
}
    }
