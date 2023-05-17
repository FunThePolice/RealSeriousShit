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
    </div>