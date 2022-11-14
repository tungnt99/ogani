<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        return view('backend.image.image');
    }
 
 
    public function store(Request $request)
    {
        $image = $request->file('file');
        $avatarName = $image->getClientOriginalName();
        $image->move(public_path('images'),$avatarName);
         
        $imageUpload = new Image();
        $imageUpload->image = $avatarName;
        $imageUpload->save();
        return response()->json(['success'=>$avatarName]);
    }
}
