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
        Edit a post
      </div>
      <div class="card-body">
        <form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{route('post.update', ['post' => $post->id])}}">
         @csrf
         @method('PUT')
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <input type="text" id="category" name="category" class="form-control" value="{{ $post->category }}" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ $post->description }}" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Body</label>
            <textarea name="body" class="form-control" required="">{{$post->body}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="/blog" class="btn btn-outline-primary"> Go back</a>
        </form>
      </div>
    </div>
@endsection    