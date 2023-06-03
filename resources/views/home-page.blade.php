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
        Create a post
      </div>
      <div class="card-body">
        <form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{url('store-form')}}">
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
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
      <div class="card">
        <div class="card-header text-center font-weight-bold">
          Posts List
        </div>
          <table class="table">
          <thead>
            <tr>             
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Category</th>
              <th scope="col"></th>
            </tr>
          </thead>
           <tbody>
             @foreach ($posts as $post )
            <tr>
              <td>{{ucwords($post->title)}} <br>
                <a href="/blog/{{$post->id}}" class="btn btn-primary btn-sm mt-4">Show</a></td>
              <td>{{ucwords($post->description)}} <br>
                 Views:{{$post->views}}</td>
              <td>{{ucwords($post->category)}} </td>
              <td>
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
              </td>
            </tr>
            @endforeach
           </tbody>
          </table>
        </div>
@endsection
