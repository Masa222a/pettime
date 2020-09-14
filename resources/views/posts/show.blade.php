@extends('layouts.admin')

@section('title', '記事詳細画面')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form action="{{ route('posts.destroy', $post->id) }}" method="post">
        @csrf
        {{ method_field('DELETE') }}
        <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか?");'>
      </form>  
      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">編集</a>
      <div class="card-header">
        <h5>タイトル：{{ $post->title }}</h5>
      </div>
      <div class="card-body">
        <p class="card-text">内容：{{ $post->body }}</p>
      </div>
      <div class="card-footer">
        <p class="text-right">投稿日時：{{ $post->created_at }}</p>
      </div>
    </div>
  </div>
</div>
@endsection