@extends('layouts.admin')

@section('title', '記事投稿画面')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if(count($errors) > 0)
        <ul>
          @foreach($errors->all() as $e)
            <li><span class="text-danger">{{ $e }}</span></li>
          @endforeach
        </ul>
      @endif
      <form action="{{ route('posts.store') }}" method="POST">
        {{csrf_field()}}
          <div class="form-group">
            <label>タイトル</label>
            <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title">
          </div>
          <div class="form-group">
            <label>内容</label>
            <textarea class="form-control" placeholder="内容" rows="5" name="body"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">作成する</button>
      </form>
    </div>
  </div>
</div>
@endsection