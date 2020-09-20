@extends('layouts.admin')

@section('title', 'ペット編集画面')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ペット編集</div>

                <div class="card-body">
                    <form action="{{ action('PetController@update') }}" method="post"
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
                          <input type="text" class="form-control" name="name" value="{{ $pet_form->name }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">種類</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="type" value="{{ $pet_form->type }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">性別</label>
                        <div class="col-md-2">
                          <select class="form-control" name="gender" id="gender">
                            <option value="m">オス</option>
                            <option value="f">メス</option>
                            <option value="others">その他</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-12 text-center">
                          <input type="hidden" name="id" value="{{ $pet_form->id }}">
                          @csrf
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