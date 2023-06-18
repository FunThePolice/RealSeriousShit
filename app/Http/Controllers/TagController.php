<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
   public function create(Request $request)
   {
    $tag = new Tag;
    $request->fill($request->all());
    $tag->save();
    return $tag;
   }
}
