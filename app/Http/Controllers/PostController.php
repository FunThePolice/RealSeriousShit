<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();
        return view('home-page',[
            'posts'=> $posts,
        ]);
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect('/blog')->with('status' , 'Blog Post Form Data Has Been inserted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/blog');
    }  
}


