@extends('layouts.admin')

@section('title', '写真詳細画面')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      
      <div class="col-md-4">
        <div class="card">
          <div class="card-header py-0">
            <div class="col text-center">
              <h5 class="mt-3">写真詳細画面</h5>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <div class="clear-fix">
                  <div class="float-left">
                    <img src="{{ $photo->image }}" height="120px" width="120px">
                  </div>
                </div>
              </div>
              <div class="col-7 text-center ml-3">
                <p class="mx-auto"value="{{ $photo->pet_id}}">{{ $photo->pet_id}}</p>
                <p>{{ $photo->body }}</p>
              </div>

            </div>
          </div>
          <div class="card-footer text-right">
            <small class="text-muted">{{ $photo->created_at }}</small>
          </div>
        </div>
      </div>
      
    </div>
  </div>
@endsection