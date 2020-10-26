@extends('layouts.admin')

@section('title', 'ペットタイム')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9 px-0">
    <!-- 投稿された新着記事が入る -->
            <div class="row">
                <h6>新着写真ブロック</h6>
            </div>
            
            <div class="row my-0">
                @foreach ($photos as $photo)
                    <div class="col-8 col-sm-6 col-md-6 col-lg-3 col-xl-2 ml-0 pl-0 mr-4">
                        <a href="/photos/{{$photo->id}}">
                        <div class="d-flex align-items-center justify-content-center" style="height:200px; width:143px">
                            <div class="card-img-top">
                                <img src="{{ $photo->image_path }}" class="my-2" width="140" style="max-height:190px;">                                
                            </div>
                        </div>

                            <p class="mb-0 card-text">{{ $photo->user->name }}</p>
                            <p class="card-text">{{ $photo->created_at }}</p>                            

                        </a>
                    </div>
                @endforeach
            </div
            
    <!-- 投稿された新着記事が入る -->
            <div class="row mt-5">
                <h6>新着ブロック</h6>
            </div>
            
            <div class="row mt-4">
                <table class="table table-bordered col-md-12 box-table mx-auto">
                    <thead class="thead-light">
                    <tr>
                        <th width="10%">ID</th>
                        <th width="20%">タイトル</th>
                        <th width="50%">本文</th>
                        <th width="10%">投稿者名</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="/posts/{{$post->id}}">{{ $post->id}}</a></td>
                            <td><a href="/posts/{{$post->id}}">{{ Str::limit($post->title,15) }}</a></td>
                            <td><a href="/posts/{{$post->id}}">{{ Str::limit($post->body,100) }}</a></td>
                            <td><a href="/posts/{{$post->id}}">{{ $post->user->name }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    <!-- ログイン時のみユーザー画面 -->
    @auth
        <div class="box-account col-md-2 order-md-2 mx-auto ml-md-auto mt-4 border-secondary">
            <div class="row">
                <div class=" mx-auto">
                    <i class="fas fa-user fa-6x mt-3 ml-3"></i>
                    <div class="list-group text-center">
                        <p class="mt-3">{{ Auth::user()->name }}さん</p>
                        <p><a href="{{ url('/pet') }}">ペット一覧</a></p>
                        <p><a href="{{ url('/user') }}">プロフィール編集</a></p>
                        {{-- hrefの引数で検索 --}}
                        <p><a href="{{ action('UserController@delete', Auth::user()->id) }}" class="text-danger" onclick='return confirm("削除しますか?");'>アカウント削除</a></p>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</div>
@endsection
