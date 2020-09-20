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
      <form action="{{ route('photos.update',$photo_form->id) }}" method="POST"
            enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        
        <div class="form-group row">
          <label class="col-md-3 col-form-label">ペットの名前</label>
          <div class="col-md-3 pl-3">
            <select class="form-control" name="pet_id" value="{{ $photo_form->pet_name }}">
              @foreach($pets as $pet)
                <option value="{{ $pet->id }}">{{ $pet->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-md-3 col-form-label">一言コメント</label>
          <div class="col-md-6">
            <textarea class="form-control" rows="5" name="body">{{ $photo_form->body }}</textarea>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-md-3">画像</label>
          <div class="col-md-8">
            <input type="file" class="form-control-file" name="image">
          </div>
        </div>
        
        <input type="hidden" name="id" value="{{ $photo_form->id }}">
        <div class="col-md-3 mx-auto">
          <button type="submit" class="btn btn-primary">更新する</button>
          
        </div>
      </form>

    </div>
  </div>
</div>
@endsection