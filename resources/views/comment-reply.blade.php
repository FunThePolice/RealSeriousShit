@extends('layout')
@section('content')
<div class="container mt-4">
    <div class="card">
      <div class="card-header text-center font-weight-bold">
        {{ucwords($comment->title)}} 
      </div>
      <div class="card-body">
        {{ucwords($comment->body)}}
      </div>
      <div class="card-footer display:flex">
        <a href="/blog" class="btn btn-outline-primary"> Go back</a>
        <div class="display:flex" style="margin-top: 20px">
          <form name="add-reply-form" id="add-reply-form" method="POST" action="{{route('comment.reply',['comment' => $comment->id])}}">
            @csrf
            @method('POST')
             <div class="form-group">
               <label for="exampleInputEmail1">Title</label>
               <input type="text" id="title" name="title" class="form-control" value="" required="">
             </div>
             <div class="form-group">
               <label for="exampleInputEmail1">Body</label>
               <textarea name="body" class="form-control" required=""></textarea>
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
           </form>
        </div>
    </div>
@endsection 