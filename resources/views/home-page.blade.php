@extends('layout')
@section('content')
<div class="container mt-4">
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
              <td>{{ucwords($post->description)}}</td>
              <td>{{ucwords($post->category)}} </td>
              <td>Views:{{$post->views}}</td>
            </tr>
            @endforeach
           </tbody>
          </table>
          <form id="post-create" method="POST" action="{{route('post.create')}}">
            @method('POST')
            @csrf
            <button class="btn btn-primary">Add Post</button>
          </form>
        </div>
@endsection
