@extends('layouts.admin')

@section('title', '写真投稿')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10">
      <div class="row">
        <h5 class="my-auto ml-3">写真一覧</h5>
        <a href="{{ action('PhotoController@add') }}" role="button" class="btn btn-primary offset-md-10">新規作成</a>
      </div>
      
      <div class="row mt-3">
        <div class="form-group row">
          <div class="col-md-6">
          	<input type="text" class="form-control ml-3" name="user_name"  placeholder="ユーザー名">
          </div>
          	<div class="col-md-2">
          	  @csrf
          		<input type="submit" href="#" class="btn btn-primary" value="検索">
          	</div>
        </div>
      </div>
      
      <div class="row mt-3 pt-3">
        @foreach ($photos as $photo)
          <div class="col-md-3">
            <a href="{{ action('PhotoController@show', $photo->id)}}" class="card-block">
              <div class="card mb-3">
                <h5 class="card-title mt-3 mx-auto" value="user_id">{{ auth::user()->name }}</h5>
                <div class="card-body pt-2">
                  <div>
                    <img src="{{ $photo->image }}" class="ml-3" width="130px" height="130px">
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
