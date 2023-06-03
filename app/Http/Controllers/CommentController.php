<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $comment = new Comment();
        $comment->fill($request->all());
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);
        return back()->withInput();
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect('/blog/{post}');
    }

}
