<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\region;

class regionController extends Controller
{
    public function getAllRegion(){
        $regions = region::all();
        return response()->json([
            "regions" => $regions
         ],200);
    }
}
