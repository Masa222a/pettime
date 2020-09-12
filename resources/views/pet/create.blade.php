@extends('layouts.admin')

@section('title', 'ペット作成画面')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ペット作成</div>

                <div class="card-body">
                    <form method="post" action="{{ action('PetController@create') }}" 
                    enctype="multipart/form-data">
                      @if(count($errors) >0)
                        <ul>
                          @foreach($errors->all() as $e)
                            <li><span class="text-danger">{{ $e }}</span></li>
                          @endforeach
                        </ul>
                      @endif

                      <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">名前</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">種類</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>
                        <div class="col-md-2">
                          <select class="form-control" name="gender" id="gender">
                            <option value="m">オス</option>
                            <option value="f">メス</option>
                            <option value="others">その他</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">画像</label>
                          <div class="col-md-6">
                              <input type="file" class="form-control-file" name="image">
                          </div>
                      </div>
                      {{ csrf_field() }}
                      <div class="form-group row">
                        <div class="col-md-12 text-center">
                          <input type="submit" class="btn btn-primary mx-auto" value="作成">
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection