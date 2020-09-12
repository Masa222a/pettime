@extends('layouts.admin')

@section('title', '掲示板')

@section('content')
  <div class="mb-4">
      <a href="{{ action('PostController@add') }}" class="btn btn-primary offset-md-10">
        新規作成
      </a>
  </div>
  <div class="container mt-4">
    @foreach ($posts as $post)
      <div class="card mb-4">
        <div class="card-header">
          {{ $post->title }}
        </div>
        <div class="card-body">
          <p class="card-text">
            {!! nl2br(e(Str::limit($post->body, 200))) !!}
          </p>
        </div>
        <div class="card-footer">
          <span class="mr-2">
            投稿日時 {{ $post->created_at->format('Y.m.d') }}
          </span>
          
          @if ($post->comments->count())
            <span class="badge badge-primary">
              コメント {{ $post->post_comments->count() }}件
            </span>
          @endif
        </div>
      </div>
    @endforeach
  </div>
@endsection
