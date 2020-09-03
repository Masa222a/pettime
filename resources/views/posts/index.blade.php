@extends('layouts.admin')

@section('title', '掲示板')

@section('content')
<style type="text/css">
  .row {
    border: 1px solid black;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-10">
      <div class="row">
        <h5 class="my-auto ml-3">記事一覧</h5>
        <a href="#" role="button" class="btn btn-primary btn-sm offset-md-10">新規作成</a>
      </div>
      
      <div class="row mt-3">
        <div class="col-md-4">
          <div class="input-group">
          	<input type="text" class="form-control" placeholder="ユーザー検索">
          	<span class="input-group-btn">
          		<button type="button" class="btn btn-primary ml-4">絞り込む</button>
          	</span>
          </div>
        </div>
      </div>
      
      <div class="row mt-3">
          <div class="col-md-3">
              <div class="card">
                  <h5 class="card-title mt-2 mx-auto">ユーザー名</h5>
                  <div class="card-body">
                    <div>
                    <img src="#" class="ml-3" width="130px" height="130px">
                      
                    </div>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
          </div>
          
          <div class="col-md-3">
              <div class="card">
                  <h5 class="card-title mt-2 mx-auto">ユーザー名</h5>
                  <div class="card-body">
                    <div>
                    <img src="#" class="ml-3" width="130px" height="130px">
                      
                    </div>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
          </div>
          
          <div class="col-md-3">
              <div class="card">
                  <h5 class="card-title mt-2 mx-auto">ユーザー名</h5>
                  <div class="card-body">
                    <div>
                    <img src="#" class="ml-3" width="130px" height="130px">
                      
                    </div>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
          </div>
          
          <div class="col-md-3">
              <div class="card">
                  <h5 class="card-title mt-2 mx-auto">ユーザー名</h5>
                  <div class="card-body">
                    <div>
                    <img src="#" class="ml-3" width="130px" height="130px">
                      
                    </div>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
          </div>
          
      </div>      



  </div>
</div>

@endsection
