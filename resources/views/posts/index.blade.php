@extends('layouts.admin')

@section('title', '掲示板')

@section('content')
<div class="container" id="app">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row">
        <h5 class="mt-2 ml-2">投稿一覧</h5>
        <a href="{{ action('PostController@create') }}" class="btn btn-primary ml-auto mr-2">新規投稿</a>
      </div>
      
      <div class="row mt-3">
        <div class="col-md-5">
          <form action="{{ route('posts.index') }}" method="get">
            <div class="form-group row align-items-right">
              <div class="col-auto">
            	  <input type="text" class="form-control" name="user_name" value="{{ $user_name }}" placeholder="ユーザー名">
            	</div>
              <div class="col-auto">
                @csrf
            	  <input type="submit" class="btn btn-primary" value="検索">
              </div>
            </div>
          </form>
        </div>
      </div>
      
      @foreach ($posts as $post)
      <div class="card mt-4">
      <a href="{{ route('posts.show', $post->id) }}">
        <div class="card-header">
          <p class="card-title my-0">{{ $post->title }}</p>
        </div>
        
        <div class="card-body">
          <p class="card-text">{{ $post->body }}</p>
        </div>
      </a>
        
        <div class="card-footer py-1">
          
          <div class="btn-toolbar float-left"> 
            <div class="btn-group mr-2">
              <like-component
                :post="{{ json_encode($post) }}">
              </like-component>
            </div>
          </div>
          
          <p class="my-auto text-muted text-right">投稿者:{{ $post->user->name }}&emsp;投稿日時:{{ $post->created_at }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
