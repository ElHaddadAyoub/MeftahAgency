<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\User;
use App\region;
use App\ville;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\ArticleImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
class PostArticleController extends Controller
{
    public function all_postArticle(){
        $postarticles = Article::with('category','user','article_images','region')->orderBy('id','desc')->get();
        return response()->json([
           "postarticles" => $postarticles
        ],200);
    }
    public function get_postArticlebyid($id){
        $postarticle = Article::with('category','user','article_images','region')->where('id',$id)->first();
        return response()->json([
            "postarticle" => $postarticle
         ],200);
    }
    public function get_tous_categories(){
        $categories = Category::all();
        return response()->json([
            "categories" => $categories
         ],200);
    }
    public function get_tous_region(){
        $region = region::all();
        return response()->json([
            "region" => $region
         ],200);
    }
    public function get_viles(){
        $villes = Article::groupBy('ville')->pluck('ville');
        return response()->json([
            "villes" => $villes
         ],200);
    }
    public function get_Subcategories(){
        $subcategories = Article::groupBy('subcategory')->pluck('subcategory');
        return response()->json([
            "subcategories" => $subcategories
         ],200);
    }
    public function get_art_by_reg($id){
        $postarticles = Article::with('category','user','article_images','region')->where('region_id',$id)->orderBy('id','desc')->get();
        return response()->json([
            "postarticles" => $postarticles
         ],200);
    }
    public function get_art_by_ville($ville){
        $postarticles = Article::with('category','user','article_images','region')->where('ville',$ville)->orderBy('id','desc')->get();
        return response()->json([
            "postarticles" => $postarticles
         ],200);
    }
    public function get_art_by_ville_subcategory($ville,$subcategory,$prix_min,$prix_max){
        $postarticles = Article::with('category','user','article_images','region')
        ->where('ville',$ville)
        ->where('subcategory',$subcategory)
        ->where('prix','>',$prix_min)
        ->where('prix','<',$prix_max)
        //->whereBetween('prix',array($prix_min,$prix_max))
        ->orderBy('id','desc')->get();
        return response()->json([
            "postarticles" => $postarticles
         ],200);
    }
    public function get_art_by_subcategory($subcategory){
        $postarticles = Article::with('category','user','article_images','region')->where('subcategory',$subcategory)->orderBy('id','desc')->get();
        return response()->json([
            "postarticles" => $postarticles
         ],200);
    }
    public function get_art_by_cat($id){
        $postarticles = Article::with('category','user','article_images','region')->where('category_id',$id)->orderBy('id','desc')->get();
        return response()->json([
            "postarticles" => $postarticles
         ],200);
    }
    public function cherche_article(){
        $cherche = \Request::get('c');
        if($cherche!=null){
            $article = Article::with('user','category','article_images','region')
                ->where('title','LIKE',"%$cherche%")
                ->orWhere('description','LIKE',"%$cherche%")
                ->get();
            return response()->json([
                'article'=>$article
            ],200);
        }else{
           return $this->all_postArticle();
        }
    }

    public function all_dernier_articles(){
        $postarticles = Article::with('category','user','article_images','region')->orderBy('id','desc')->get();
        return response()->json([
           "postarticles" => $postarticles
        ],200);
    }

    public function add_annonce(Request $request){

        $title = $request->title;
        $description = $request->description;
        $category_id = $request->category_id;
        $user_id =  Auth::user();
        $images = $request->images;
        $article = Article::create([
            'title' => $title,
            'description' => $description,
            'category_id' => $category_id,
            'user_id' => $user_id->id,
            //'photo' => $request['photo'],
        ]);

        //store Image
        foreach($images as $image) {
            $imagePath = Storage::disk('uploads')->put($user_id->email . '/articles/' . $article->id, $image);
            ArticleImage::create([
                'article_image_caption' => $title,
                'article_image_path' => '/uploads/' . $imagePath,
                'article_id' => $article->id
            ]);
        }
        return response()->json(['error'=>false ,'data'=> $article]);
    }
    public function annonces_by_user(){
        $annonces = Article::with('category','user','region')->where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return response()->json([
            "annonces" => $annonces
         ],200);
    }
    public function userProfile(){
        $user = User::where('id',Auth::user()->id)->get();
        return response()->json([
            "userr" => $user
         ],200);
    }
    public function editerprofile(){
        $userr = User::where('id',Auth::user()->id)->get();
        return response()->json([
            'profile'=>$userr
        ],200);
    }
    public function editer_annonce($id){
        $annonces = Article::find($id);
        return response()->json([
            'annonces'=>$annonces
        ],200);
    }
    public function update_annonce(Request $request, $id){
        $annonces = Article::find($id);
        $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000'
        ]);


        if($request->photo!=$annonces->photo){
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/img/uploadimage/";
            $image = $upload_path. $annonces->photo;
            $img->save($upload_path.$name);

            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $annonces->photo;
        }

        $annonces->title = $request->title;
        $annonces->description = $request->description;
        $annonces->category_id = $request->category_id;
        $annonces->photo = $name;
        $annonces->save();
    }
    public function update_profile(Request $request){
        $id = Auth::user()->id;
        $profile = User::find($id);
        $this->validate($request,[
            'name'=>'required|min:2|max:50',
            'email' => 'required|string|email|max:191',
            'password' => 'required|string|min:6'
        ]);


        if($request->photo!=$profile->photo){
            $strpos = strpos($request->photo,';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/img/profile/";
            $image = $upload_path. $profile->photo;
            $img->save($upload_path.$name);

            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $profile->photo;
        }

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->password = Hash::make($request['password']);
        $profile->photo = $name;
        $profile->save();

    }
    public function favoritePost(Post $post)
{
    Auth::user()->favorites()->attach($post->id);

    return back();
}

/**
 * Unfavorite a particular post
 *
 * @param  Post $post
 * @return Response
 */
public function unFavoritePost(Post $post)
{
    Auth::user()->favorites()->detach($post->id);

    return back();
}

}
