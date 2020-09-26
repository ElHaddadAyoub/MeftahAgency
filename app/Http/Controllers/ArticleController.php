<?php

namespace App\Http\Controllers;
use App\Article;
use App\Category;
use App\User;
use App\ArticleImage;
use App\Favorite;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Image;
//use Faker\Provider\Image;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    public function all_Article(){
        $articles = Article::with('category','user','region')->orderBy('id','desc')->get();
        return response()->json([
           "articles" => $articles
        ],200);
    }
    public function counter(){
        $countarticle = Article::all();
        return response()->json([
            "countArticle" => $countarticle->count()
         ],200);
    }

    public function add_article(Request $request){

        $title = $request->title;
        $description = $request->description;
        $category_id = $request->category_id;
        $subcategory = $request->subcategory;
        $etat = $request->etat;
        $caracteristique = $request->caracteristique;
        $region_id = $request->region_id;
        $ville = $request->ville;
        $prix = $request->prix;
        $nb_chambre = $request->nb_chambre;
        $surface = $request->surface;
        error_log(request('caracteristique'));
        //$caracteristique = implode(',', $caracteristique);

       // $caracteristique = $request->except('news');
        $user_id =  Auth::user();
        $images = $request->images;
        $article = Article::create([
            'title' => $title,
            'description' => $description,
            'category_id' => $category_id,
            'user_id' => $user_id->id,
            'subcategory'=>$subcategory,
            'etat'=>$etat,
            'caracteristique'=>$caracteristique,
            'region_id'=>$region_id,
            'ville'=>$ville,
            'prix'=>$prix,
            'nb_chambre'=>$nb_chambre,
            'surface'=>$surface,
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
    public function delete_article($id){
        $article = Article::find($id);
        $image_path = public_path()."/img/uploadimage/";
        $image = $image_path. $article->photo;
        if(file_exists($image)){
            @unlink($image);
        }
        $article->delete();
    }
    public function ajouter_favoris($id){
        
        if($favTest = Favorite::where('user_id', Auth::user()->id)->where('article_id',$id)->first()){
            return response()->json(['article deja ajouter aux favoris'=>false ,'data'=> $favTest]);
        }else{
            $fav = Favorite::create([
                'user_id' =>  Auth::user()->id,
                'article_id'=>$id
            ]);
            return response()->json(['test'=>false ,'data'=> $fav]);
            
        }
     

        
    }
    public function edit_article($id){
        $article = Article::findOrFail($id);
        return response()->json([
            'article'=>$article
        ],200);
    }
    public function update_article(Request $request, $id){
        
        return response()->json([
            'dataKK'=>$request
        ],200);
        // $article = Article::find($id);
        // $this->validate($request->$post,[
        //     'title'=>'required|min:2|max:50',
        //     'description'=>'required|min:2|max:1000'
        // ]);
        // if($request->data->images!=$article->images){
        //     $strpos = strpos($request->images,';');
        //     $sub = substr($request->images,0,$strpos);
        //     $ex = explode('/',$sub)[1];
        //     $name = time().".".$ex;
        //     $img = Image::make($request->images)->resize(200, 200);
        //     $upload_path = public_path()."/img/uploadimage/";
        //     $image = $upload_path. $article->photo;
        //     $img->save($upload_path.$name);

        //     if(file_exists($image)){
        //         @unlink($image);
        //     }
        // }else{
        //     $images = $article->images;
        // }

        // $article->title = $request->post->title;
        // $article->description = $request->post->description;
        // $article->category_id = $request->post->category_id;
        // $article->images = $images;
        // $article->description = $request->post->description;
        // $article->category_id = $request->post->category_id;
        // $article->subcategory = $request->post->subcategory;
        // $article->etat = $request->post->etat;
        // $article->caracteristique = $request->post->caracteristique;
        // $article->region_id = $request->post->region_id;
        // $article->ville = $request->post->ville;
        // $article->prix = $request->post->prix;
        // $article->nb_chambre = $request->post->nb_chambre;
        // $article->surface = $request->post->surface;
        // $article->save();


  
    
    }
    public function cherche_article(){
        $cherche = \Request::get('c');
        if($cherche!=null){
            $article = Article::with('user','category')
            ->where('title','LIKE',"%$cherche%")
            ->orWhere('description','LIKE',"%$cherche%")
            ->get();
            return response()->json([
                'articles'=>$article
            ],200);
        }else{
           return $this->all_Article();
        }
    }
}
