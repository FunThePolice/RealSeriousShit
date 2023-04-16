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
            <input type="text" id="title" name="title" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea name="description" class="form-control" required=""></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
      <div class="card">
        <div class="card-header text-center font-weight-bold">
          Posts List
        </div>
        <div class="card-body mt-8 flex flex-col justify-between">
            @foreach ($posts as $post)
              <div class="flex text-center  border border-black rounded-xl mb-50 ">
                  <div class="mt-4">
                    <h1 class="text-3xl">
                        {{ucwords($post->title)}}
                     </h1>
                  </div>
                     <div class="text-sm mt-4">
                       <p>
                        {{$post->description}}
                       </p>
                     </div>
                     <div class="align-right">
                     <form  id="delete-post" method="POST" action="{{url('delete-post', ['id' => $post->id])}}">
                        @method('DELETE')
                        @csrf
                        <button  class="btn btn-danger">Delete</button>
                    </form>
                     </div>
                </div>
            @endforeach
          </div>
        </div>
        @endsection
