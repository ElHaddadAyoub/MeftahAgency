<?php

namespace App\Http\Controllers;
use App\Subcategory;
use App\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function all_subcategory(){
        $subcategory = Subcategory::with('category')->orderBy('id','desc')->get();
        return response()->json([
           "subcategory" => $subcategory
        ],200);
      }
      public function all_subcategoryByCategory($id){
            //$val = $category->Subcategory()->orderBy('category_id','ASC')->get();
            $val = Subcategory::with('category')->where('category_id',$id)->get();
            return response()->json([
                "val" => $val
             ],200);
      }

    public function add_subcategory(Request $request){

        $this->validate($request,[
            'title' => 'required|string',
            'description' => 'required|min:10',
            'category_id' => 'required'
            //'password' => 'required|string|min:6',
            //'bio' =>'string|min:10'
        ]);
        $strpos = strpos($request->avatar,';');
        $sub = substr($request->avatar,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->avatar)->resize(200, 200);
        $upload_path = public_path()."/img/subcategoryImage/";
        $img->save($upload_path.$name);
        return Subcategory::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
            'avatar' => $name,
        ]);

    }
    public function edit_subcategory($id){
        $subcategory = Subcategory::find($id);
        return response()->json([
            'subcategory'=>$subcategory
        ],200);
    }
    public function update_subcategory(Request $request, $id){
        $subcategory = Subcategory::find($id);
        $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000'
        ]);


        if($request->avatar!=$subcategory->avatar){
            $strpos = strpos($request->avatar,';');
            $sub = substr($request->avatar,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->avatar)->resize(200, 200);
            $upload_path = public_path()."/img/subcategoryImage/";
            $image = $upload_path. $subcategory->photo;
            $img->save($upload_path.$name);

            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $subcategory->avatar;
        }

        $subcategory->title = $request->title;
        $subcategory->description = $request->description;
        $subcategory->category_id = $request->category_id;
        $subcategory->avatar = $name;
        $subcategory->save();
    }

    public function delete_subcategory($id){
        $subcategory = Subcategory::find($id);
        $image_path = public_path()."/img/subcategoryImage/";
        $image = $image_path. $subcategory->avatar;
        if(file_exists($image)){
            @unlink($image);
        }
        $subcategory->delete();
    }
    public function cherche_subcategory(){
        $cherche = \Request::get('c');
        if($cherche!=null){
            $subcategory = Subcategory::with('category')->where('title','LIKE',"%$cherche%")
                ->orWhere('description','LIKE',"%$cherche%")
                ->get();
            return response()->json([
                'subcategory'=>$subcategory
            ],200);
        }else{
           return $this->all_subcategory();
        }
    }

}
