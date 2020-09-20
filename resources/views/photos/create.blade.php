@extends('layouts.admin')

@section('title', '写真投稿画面')

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
      <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
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
              <label class="col-md-4 text-md-right">画像</label>
              <div class="col-md-8">
                <input type="file" class="form-control-file" name="image">
              </div>
            </div>
            <div class="col text-center">
              <input type="submit" class="btn btn-primary" value="投稿">
              
            </div>
      </form>
    </div>
  </div>
</div>
@endsection