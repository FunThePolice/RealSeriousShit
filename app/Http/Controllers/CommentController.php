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
        $post->comments()->save($comment);
        return back()->withInput();
    }
    public function reply(Request $request, Comment $comment)
    {
        $reply = new Comment();
        $reply->fill($request->all());
        $comment->replies()->save($reply);
        return back()->withInput();
    }
    public function create(Comment $comment)
    {
        return view('comment-reply',compact('comment'));
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->withInput();
    }

}
