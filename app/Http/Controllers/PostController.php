<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Post $post)
    {
        $posts = Post::all();
        return view('home-page',[
            'posts'=> $posts,
            'post'=>$post
        ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            'post'=>$post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'=>$request->title,
            'category'=>$request->category,
            'description'=>$request->description,
            'body'=>$request->body 
        ]);
        return redirect('/blog');
    }

    public function edit(Post $post)
    {
        return view('edit-post', [
            'post' => $post,
        ]);
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category = $request->category;
        $post->body = $request->body;
        $post->save();
        return redirect('/blog')->with('status' , 'Blog Post Form Data Has Been inserted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/blog');
    }
}


