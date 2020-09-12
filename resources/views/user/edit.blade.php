@extends('layouts.admin')

@section('title', 'アカウント編集画面')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">アカウント編集</div>
          <form action="{{ action('UserController@update') }}" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
              <ul>
                @foreach($errors->all() as $e)
                  <li>{{ $e }}</li>
                @endforeach
              </ul>
            @endif
            <div class="form-group row my-3">
              <label class="col-md-2 col-form-label text-md-right" for="title">ニックネーム</label>
              <div class="col-md-9">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" value="{{ $user_form->name }}">
                
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            
            <div class="form-group row my-3">
              <div class="col-md-9">
                <div class="form-group row">
                  <label for="gender" class="col-md-4 col-form-label text-center">性別</label>
                  <div class="col-md-3">
                    <select class="form-control my-1" name="gender" id="gender">
                      <option value="m">男性</option>
                      <option value="f">女性</option>
                      <option value="others">その他</option>
                    </select>
                  </div>
                </div>
                @error('gender')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
          </div>
            
            <div class="form-group row my-3">
              <label class="col-md-3 col-form-label text-md-left ml-2" for="email">メールアドレス</label>
                <div class="col-md-6">
                  <textarea class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">{{ $user_form->email }}</textarea>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
            </div>
                        
            <div class="form-group row my-3">
              <div class="col-md-12 text-center">
                <input type="hidden" name="id" value="{{ $user_form->id }}">
                  {{ csrf_field() }}
                <input type="submit" class="btn btn-primary mx-auto" value="更新">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection