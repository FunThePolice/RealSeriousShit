<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $image = new Image;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('storage'), $imageName);
        $image->name = $imageName;
        return $image;
    }
} 

