<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;

class PostController extends Controller
{

    public function index(Post $post)
    {
        $posts = Post::all();
        return view('home-page', compact('posts','post'));
    }
    
    public function create()
    {
        return view('post-create');
    }

    public function show(Post $post, Comment $comment)
    {
        $comments = Comment::all();
        $post->increment('views');
        return view('post', compact('post','comments','comment'));
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());    
        return redirect('/blog');
    }

    public function edit(Post $post)
    {
        return view('edit-post', compact('post'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->fill($request->all());
        $post->save();
        $image = (new ImageController)->store($request);
        $post->images()->save($image);
        $tag = (new TagController)->create($request);
        $post->tags()->save($tag);
        return redirect('/blog');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/blog');
    }
}


