<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Services\ImageService;
use App\Services\TagService;
use Illuminate\Http\Request;

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
        (new ImageService)->update($request,$post);
        (new TagService)->update($request,$post);
        return redirect('/blog');
    }

    public function edit(Post $post)
    {
        $image = (new ImageService)->get($post);
        $tag = (new TagService)->get($post);
        return view('edit-post', compact('post','image','tag'));
    }

    public function store(Request $request)
    {
        
        $post = new Post();
        $post->fill($request->all());
        $post->save();
        (new ImageService)->store($request,$post);
        (new TagService)->create($request,$post);
        return redirect('/blog');
    }

    public function destroy(Post $post)
    {
        (new ImageService)->delete($post);
        $post->tags()->delete();
        $post->delete();
        return redirect('/blog');
    }
}


