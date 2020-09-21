@extends('layouts.admin')

@section('title', '写真詳細画面')

@section('content')
<div class="container">
    <div class="container">
    <div class="row justify-content-center">
      
      <div class="col-md-12 px-0">
        <div class="card">
          <div class="card-header py-0">
            <div class="col text-center">
              <h5 class="mt-3">写真詳細画面</h5>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 ml-auto">
                <img class="mx-auto d-block" style="max-width: 100%;height: auto;" src="{{ $photo->image_path }}">

              </div>
              <div class="col-12 text-center ml-3 mt-4">
                <h6 class="mb-3">ペットの名前</h6>
                <p class="mx-auto">{{ $photo->pet->name }}</p>
                <h6 class="mb-3">本文</h6>
                <p>{{ $photo->body }}</p>
              </div>
            </div>
          </div>
          
          @if(Auth::user()->id === $photo->user_id)
          <div class="card-footer text-right">
            <div class="btn-toolbar justify-content-between">
              <div class="btn-group mr-2">
                <form action="{{ route('photos.destroy', $photo->id) }}" method="post">
                  @csrf
                  {{ method_field('DELETE') }}
                  <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("削除しますか?");'>
                </form>  
                <a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-primary btn-sm ml-2">編集</a>
              </div>
            <small class="text-muted mr-2">{{ $photo->created_at }}</small>
            </div>
          </div>
          @endif
        </div>
      </div>
      
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form action="{{ route('photocomments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="photo_id" value="{{ $photo->id }}">
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
      @foreach ($photocomments as $photocomment)
        <div class="card mt-3">
          <div class="card-body">
            <p class="card-text">{{ $photocomment->body }}</p>
            <p class="card-text">投稿者:{{ $photocomment->user->name }}&emsp;投稿日時:{{ $photocomment->created_at }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection