@extends('layouts.admin')

@section('title', '写真詳細画面')

@section('content')
<div class="container">
    <div class="container">
    <div class="row justify-content-center">
      
      <div class="col-md-4">
        <div class="card">
          <div class="card-header py-0">
            <div class="col text-center">
              <h5 class="mt-3">写真詳細画面</h5>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <div class="clear-fix">
                  <div class="float-left">
                    <img src="{{ asset('storage/image/'.$photo->image_path) }}" height="120px" width="120px">
                  </div>
                </div>
              </div>
              <div class="col-7 text-center ml-3">
                <p class="mx-auto">{{ $photo->pet->name }}</p>
                <p>{{ $photo->body }}</p>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <small class="text-muted mr-2">{{ $photo->created_at }}</small>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
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