@extends('layouts.admin')

@section('title', 'アカウント画面')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="text-center">
                <p class="my-auto">アカウント画面</p>
              </div>
            </div>
    
            <div class="card-body">
              <div class="text-center">
                <div>
                  <img src="#" height="100px" width="100px">
                </div>
                <p class="my-2">
                  {{ Auth::user()->name }}
                </p>
                <p class="my-2">
                  {{ Auth::user()->gender }}
                </p>
                <p class="my-2">
                  {{ Auth::user()->email }}
                </p>
                  
                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-5 mx-auto">
                    <a href="{{ action('UserController@edit', ['id' => Auth::id()]) }}">編集</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection