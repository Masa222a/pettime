@extends('layouts.admin')

@section('title', '記事投稿画面')

@section('content')
  <div class="container mt-4">
    <div class="border p-4">
      <h1 class="h5 mb-4">
        投稿新規作成
      </h1>
      
      <form method="POST" action="{{ action('PostController@create') }}">
        @csrf
        
        <fieldset class="mb-4">
          <div class="form-group">
            <label class="title">
              タイトル
            </label>
              <input id="title" name="title" class="form-control {{ $errors->has('title') ? 'is-invaild' : '' }}" 
              value="{{ old('title') }}"type="text">
              @if ($errors->has('title'))
                <span class="invaild-feedback">
                  {{ $errors->first('title') }}
                </span>
              @endif
          </div>
          
          <div class="form-group">
            <label for="body">
              本文
            </label>
            <textarea class="form-control {{ $errors->has('body') ? 'is-invaild' : '' }}" 
            type="textarea" id="body" name="body" row="4">
              {{ old('body') }}
            </textarea>
            @if ($errors->has('body'))
              <div class="invaild-feedback">
                {{ $errors->first('body') }}
              </div>
            @endif  
          </div>
          
          <div class="mt-5">
            <a class="btn btn-secondary" href="{{ action('PostController@index') }}">
              キャンセル
            </a>
            
            <button type="submit" class="btn btn-primary">
              投稿する
            </button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
@endsection