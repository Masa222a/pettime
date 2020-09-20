@extends('layouts.admin')

@section('title', '写真投稿')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10">
      <div class="row">
        <h5 class="my-auto ml-3">写真一覧</h5>
        <a href="{{ route('photos.create') }}" role="button" class="btn btn-primary ml-auto mr-2">新規作成</a>
      </div>
      <div class="row mt-3">
        <div class="col-md-5">
          <form action="{{ route('photos.index') }}" method="get">
            <div class="form-group row align-items-right">
              <div class="col-auto">
            	<input type="text" class="form-control ml-3" name="user_name" value="{{ $user_name }}" placeholder="ユーザー名">
            	</div>
              <div class="col-auto">
                @csrf
            	  <input type="submit" class="btn btn-primary" value="検索">
              </div>
            </div>
          </form>
        </div>
      </div>
      
      <div class="row mt-3 pt-3">
        @foreach ($photos as $photo)
          <div class="col-8 col-sm-6 col-md-3 mx-auto">
            <a href="{{ route('photos.show', $photo->id) }}" class="card-block">
              <div class="card mb-3">
                <h5 class="card-title mt-3 mx-auto" value="user_id">{{ $photo->user->name }}</h5>
                <div class="card-body pt-2">
                  <div>
                    <img src="{{ asset('storage/image/'.$photo->image_path) }}" class="ml-3" width="130px" height="130px">
                  </div>
                </div>
                <div class="card-footer">
                  <small class="text-muted">{{ $photo->created_at }}</small>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
      
     
    </div>
  </div>

</div>
@endsection
