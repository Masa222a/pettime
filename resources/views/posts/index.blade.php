@extends('layouts.admin')

@section('title', '掲示板')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row">
        <h5 class="mt-2 ml-2">投稿一覧</h5>
        <a href="{{ route('posts.create') }}" class="btn btn-primary ml-auto mr-2">新規投稿</a>
      </div>
      @foreach ($posts as $post)
      <a href="{{ route('posts.show', $post->id) }}">
      <div class="card mt-4">
        <div class="card-header">
          <p class="card-title my-0">{{ $post->title }}</p>
        </div>
        <div class="card-body">
          <p class="card-text">{{ $post->body }}</p>
          
        </div>
        <div class="card-footer text-muted text-right py-1">
          <p class="my-auto">投稿者:{{ $post->user->name }}&emsp;投稿日時:{{ $post->created_at }}</p>
        </div>
      </div>
      </a>
      @endforeach
    </div>
  </div>
</div>
@endsection
