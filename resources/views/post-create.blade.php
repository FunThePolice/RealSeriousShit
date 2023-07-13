@extends('layout')
@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Create a post
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{route('store')}}" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" id="title" name="title" class="form-control" value="" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Category</label>
          <input type="text" id="category" name="category" class="form-control" value="" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <input type="text" id="description" name="description" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Body</label>
          <textarea name="body" class="form-control" required=""></textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Create a tag</label>
          <input type="text" id="tag" name="tag_name" class="form-control">
        </div>    
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/blog" class="btn btn-outline-primary"> Go back</a>
      </form>
    </div>
  </div>
</div>
@endsection 