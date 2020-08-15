<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleImage;
use Auth;
use Storage;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /* public function fileStore(Request $request)
    {
        return $request->all();
        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        for ($i = 0; $i < count($photos); $i++) {
                $photo = $photos[$i];
            $imageName = $photo->getClientOriginalName();
            $photo->move(storage_path('images'), $imageName);
        }
    }
 */
}
