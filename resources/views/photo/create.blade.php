@extends('layouts.admin')

@section('title', '写真投稿画面')

@section('content')
<style type="text/css">
  .row {
    border: 1px solid black;
  }
</style>
  <div class="container">
    <div class="col-md-6 mx-auto">
      <div class="card">
        <div class="card-header text-center">
          写真投稿画面
        </div>
        
        <div class="card-body">
          <form method="post" action="{{ action('PhotoController@create') }}"
          enctype="multipart/form-data">
            @if(count($errors) > 0)
              <ul>
                @foreach($errors->all() as $e)
                  <li><span class="text-danger">{{ $e }}</span></li>
                @endforeach
              </ul>
            @endif
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">ペットの名前</label>
              <div class="col-md-3">
                <select class="form-control" name="pet_id">
                  @foreach($pets as $pet)
                    <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">一言コメント</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="body" value="{{ old('body') }}">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-2 text-md-right">画像</label>
              <div class="col-md-8">
                <input type="file" class="form-control-file" name="image">
              </div>
            </div>
            @csrf
            <div class="col text-center">
              <input type="submit" class="btn btn-primary" value="投稿">
              
            </div>
          </form>
        </div>
        
      </div>
      
    </div>
  </div>

@endsection
