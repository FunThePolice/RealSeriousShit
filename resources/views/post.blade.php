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
                @foreach ($post->images as $image)
                <img src="{{ asset('storage/' . $image->name) }}" alt="Image" width="300" height="250"/>
                @endforeach
                {{ucwords($post->body)}}
            </div>
                <div class="card-footer display:flex justify-content:space-between align-items:center">
                    <div>
                    <a href="/blog" class="btn btn-outline-primary"> Go back</a>
                    </div>
                    <div>
                    <form id="post-edit" method="POST" action="{{route('post.edit', ['post' => $post->id])}}">
                        @method('GET')
                        @csrf
                        <button class="btn btn-primary">Edit</button>
                    </form>
                    <form id="post-delete" method="POST" action="{{route('post.delete', ['post' => $post->id])}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm mt-4">Delete</button>
                    </form>
                    </div>
                </div>
                <div>
                    @foreach ($post->tags as $tag)
                        {{$tag->tag_name}} |
                    @endforeach
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
                            @include('partials.comment', $comment)
                            {!! \App\Helpers\CommentsHelper::getCommentReplies($comment) !!}
                        @endforeach
                    </tbody>
                </table>
                <form name="add-comment-form" id="add-comment-form" method="POST"
                      action="{{route('comment.save',['post' => $post->id])}}">
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
