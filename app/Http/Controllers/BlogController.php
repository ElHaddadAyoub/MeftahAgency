<?php

namespace App\Http\Controllers;
use App\blog;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function allblog() {
        $countblog = blog::with('user')->orderBy('id','desc')->get();
        return response()->json([
            "countBlog" => $countblog->count(),
            "blog" => $countblog
         ],200);
    }
    public function ajouterblog(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'required|min:10',


        ]);
        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->photo)->resize(200, 200);
        $upload_path = public_path()."/img/blog/";
        $img->save($upload_path.$name);
        return blog::create([
            'user_id' =>  Auth::user()->id,
            'title' => $request['title'],
            'description' => $request['description'],
            'photo' => $name,
        ]);
    }
    public function blogByid($id){
        $blog = blog::with('user')->where('id',$id)->first();
        return response()->json([
            "blog" => $blog
         ],200);
    }
    public function delete_blog($id){
        $blog = blog::findOrFail($id);
        $blog->delete();
        return ['msg','delete with success!'];
    }

}
