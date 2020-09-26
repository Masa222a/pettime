@extends('layouts.admin')

@section('title', '記事詳細画面')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">

      <div class="card-header py-2">
        <h5 class="mb-0">{{ $post->title }}</h5>
      </div>
      <div class="card-body">
      @if(Auth::user() && Auth::user()->id === $post->user_id)
        <div class="btn-toolbar float-right">
          <div class="btn-group">
            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("削除しますか?");'>
            </form>  
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm ml-2">編集</a>
          </div>
        </div>
      @endif
        <p class="card-text my-4 py-2">{{ $post->body }}</p>
        <p class="mb-0 text-right">投稿者:{{ $post->user->name }}&emsp;投稿日時：{{ $post->created_at }}</p>
      </div>
      
      </div>
    </div>
  </div>
  
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form action="{{ route('postcomments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
          <div class="form-group mt-2">
            <label>コメント</label>
            <textarea class="form-control" placeholder="内容" row="5" name="body"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">コメントする</button>
      </form>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      @foreach ($postcomments as $postcomment)
        <div class="card mt-3">
          <div class="card-body">
            <p class="card-text">{{ $postcomment->body }}</p>
            <p class="card-text text-right">投稿者:{{ $postcomment->user->name }}&emsp;投稿日時:{{ $postcomment->created_at }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection