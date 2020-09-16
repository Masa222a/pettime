@extends('layouts.admin')

@section('title', '写真編集画面')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('posts.update',$post_form->id) }}" method="POST">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
          <label>タイトル</label>
          <input type="text" class="form-control" value="{{ $post_form->title }}" name="title">
        </div>
        <div class="form-group">
          <label>内容</label>
          <textarea class="form-control" rows="5" name="body">{{ $post_form->body }}</textarea>
        </div>
        <input type="hidden" name="id" value="{{ $post_form->id }}">
        <button type="submit" class="btn btn-primary">更新する</button>
      </form>
    </div>
  </div>
</div>
@endsection