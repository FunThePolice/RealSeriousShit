<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Post $post)
    {
        $posts = Post::all();
        return view('home-page',[
            'posts' => $posts,
            'post' => $post,
        ]);
    }

    public function show(Post $post, Comment $comment)
    {
        $comments = Comment::all();
        $post->increment('views');
        return view('post',[
            'post' => $post,
            'comments' => $comments,
            'comment' => $comment
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());    
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
        $post = new Post();
        $post->fill($request->all());
        $post->save();
        return redirect('/blog')->with('status' , 'Blog Post Form Data Has Been inserted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/blog');
    }
}


