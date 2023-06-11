@extends('layout')
@section('content')
<div class="container mt-4">
    @if(session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    @endif
    <div class="card">
      <div class="card-header text-center font-weight-bold">
        {{ucwords($post->title)}} 
      </div>
      <div class="card-body">
        {{ucwords($post->body)}}
      </div>
      <div class="card-footer display:flex">
        <a href="/blog" class="btn btn-outline-primary"> Go back</a>
        <div class="display:flex" style="margin-top: 20px">
          <form  id="post-edit" method="POST" action="{{url('post-edit', ['id' => $post->id])}}">
            @method('GET')
            @csrf
          <button  class="btn btn-primary">Edit</button>
          </form>
          <form  id="post-delete" method="POST" action="{{url('post-delete', ['id' => $post->id])}}">
            @method('DELETE')
            @csrf
            <button  class="btn btn-danger btn-sm mt-4">Delete</button>
            </form>
        </div>
    </div>
    <div class="card">
      <div class="card-header text-center font-weight-bold">
        Comments
      </div>
      <table class="table">
        <thead>
          <tr>             
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($post->comments as $comment)
          @if ($post->id == $comment->commentable_id)
           <tr>
             <td>{{ucwords($comment->title)}}</td>
             <td>{{ucwords($comment->body)}}</td>
             <td>
               <form  id="add-reply-form" method="POST" action="{{route('reply.create', ['comment' => $comment->id])}}">
               @method('GET')
               @csrf
               <button  class="btn btn-primary">Reply</button>
               </form>
             </td>
           </tr>
          @foreach ($comment->replies as $comment)         
          <tr>
            <td colspan="2">{{$comment->body}}</td>
            <td>
              <form  id="add-reply-form" method="POST" action="{{route('reply.create', ['comment' => $comment->id])}}">
                @method('GET')
                @csrf
                <button  class="btn btn-primary">Reply</button>
                </form>
          @endforeach
          @endif
          @endforeach
        </tbody>
      </table>
      <form name="add-comment-form" id="add-comment-form" method="POST" action="{{route('comment.save',['post' => $post->id])}}">
        @csrf
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