@extends('layouts.admin')

@section('title', '記事詳細画面')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form action="{{ route('posts.destroy', $post->id) }}" method="post">
        @csrf
        {{ method_field('DELETE') }}
        <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("削除しますか?");'>
      </form>  
      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">編集</a>
      <div class="card-header">
        <h5>タイトル：{{ $post->title }}</h5>
      </div>
      <div class="card-body">
        <p class="card-text">内容:{{ $post->body }}</p>
        <p>投稿者:{{ $post->user->name }}</p>
        <p>投稿日時:{{ $post->created_at }}</p>
      </div>
      <div class="card-footer">
        <p class="text-right">投稿日時：{{ $post->created_at }}</p>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form action="{{ route('postcomments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
          <div class="form-group">
            <label>コメント</label>
            <textarea class="form-control" placeholder="内容" row="5" name="body"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">コメントする</button>
      </form>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      @foreach ($postcomments as $postcomment)
        <div class="card mt-3">
          <h5 class="card-header">投稿者:{{ $postcomment->user->name }}</h5>
          <div class="card-body">
            <h5 class="card-title">投稿日時:{{ $postcomment->created_at }}</h5>
            <p class="card-text">内容:{{ $postcomment->body }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection