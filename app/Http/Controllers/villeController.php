<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ville;

class villeController extends Controller
{
    public function all_VilleByregion($id){
        //$val = $category->Subcategory()->orderBy('category_id','ASC')->get();
        $val = ville::with('region')->where('region',$id)->get();
        return response()->json([
            "val" => $val
         ],200);
  }
}
