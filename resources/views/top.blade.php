@extends('layouts.admin')

@section('title', 'ペットタイム')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <h6>新着写真ブロック</h6>
            </div>
    
    <!-- 新着の写真が入る -->
            <div class="row">
                <div class="col-md-2 my-3 mx-auto">
                    <img src="#" class="my-2 " height="130px" width="120px">
                    <p class="mb-0">投稿者</p>
                    <p>日付</p>
                </div>
                <div class="col-md-2 my-3 mx-auto">
                    <img src="#" class="my-2 " height="130px" width="120px">
                    <p class="mb-0">投稿者</p>
                    <p>日付</p>
                </div>
                <div class="col-md-2 my-3 mx-auto">
                    <img src="#" class="my-2 " height="130px" width="120px">
                    <p class="mb-0">投稿者</p>
                    <p>日付</p>
                </div>
                <div class="col-md-2 my-3 mx-auto">
                    <img src="#" class="my-2 " height="130px" width="120px">
                    <p class="mb-0">投稿者</p>
                    <p>日付</p>
                </div>
                <div class="col-md-2 my-3 mx-auto">
                    <img src="#" class="my-2 " height="130px" width="120px">
                    <p class="mb-0">投稿者</p>
                    <p>日付</p>
                </div>
            </div>
            
            <div class="row mt-5">
                <h6>新着ブロック</h6>
            </div>
            
    <!-- 投稿された新着記事が入る -->
            <div class="row">
                <table class="table col-md-10 box-table">
                    <tr>
                        <th>ID</th>
                        <th>タイトル</th>
                        <th>本文</th>
                        <th>投稿者名</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>タイトル１</td>
                        <td>本文が入ります。本文が入ります。本文が入ります。本文が入ります。</td>
                        <td>投稿太郎</td>
                    </tr>
                </table>
            </div>
        </div>
        
    <!-- ログイン時のみユーザー画面 -->
    @auth
        <div class="box-account col-md-2 order-md-2 mx-auto ml-md-auto">
            <div class="row">
                <div class=" mx-auto">
                        <img src="#" class="mt-5" height="130px" width="120px">
                        <div class="list-group text-center">
                            <p class="mt-3">{{ Auth::user()->name }}さん</p>
                            <p><a href="{{ url('/pet') }}">ペット一覧</a></p>
                            <p><a href="{{ url('/user') }}">プロフィール編集</a></p>
                            {{-- hrefの引数で検索 --}}
                            <p><a href="{{ action('UserController@delete', Auth::user()->id) }}">アカウント削除</a></p>
                        </div>
                </div>
            </div>
        </div>
    @endauth
</div>

@endsection
