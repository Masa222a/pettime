@extends('layouts.admin')

@section('title', 'ペットタイム')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
    <!-- 投稿された新着記事が入る -->
            <div class="row">
                <h6>新着写真ブロック</h6>
            </div>
            
            <div class="row">
                @foreach ($photos as $photo)
                    <div class="col-8 col-sm-6 col-md-2 my-2 mx-auto">
                        <a href="/photos/{{$photo->id}}">
                            <img src="{{ asset('storage/image/'.$photo->image_path) }}" class="my-2 " height="130px" width="120px">
                            <p class="mb-0">{{ $photo->user->name }}</p>
                            <p>{{ $photo->created_at }}</p>
                        </a>
                    </div>
                @endforeach
            </div
            
    <!-- 投稿された新着記事が入る -->
            <div class="row mt-5">
                <h6>新着ブロック</h6>
            </div>
            
            <div class="row mt-4">
                <table class="table col-md-11 box-table mx-auto">
                    <tr>
                        <th>ID</th>
                        <th>タイトル</th>
                        <th>本文</th>
                        <th>投稿者名</th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="/posts/{{$post->id}}">{{ $post->id}}</a></td>
                            <td><a href="/posts/{{$post->id}}">{{ Str::limit($post->title,15) }}</a></td>
                            <td><a href="/posts/{{$post->id}}">{{ Str::limit($post->body,150) }}</a></td>
                            <td><a href="/posts/{{$post->id}}">{{ $post->user->name }}</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        
    <!-- ログイン時のみユーザー画面 -->
    @auth
        <div class="box-account col-md-2 order-md-2 mx-auto ml-md-auto">
            <div class="row">
                <div class=" mx-auto">
                        <i class="fas fa-user fa-6x mt-3 ml-3"></i>
                        <div class="list-group text-center">
                            <p class="mt-3">{{ Auth::user()->name }}さん</p>
                            <p><a href="{{ url('/pet') }}">ペット一覧</a></p>
                            <p><a href="{{ url('/user') }}">プロフィール編集</a></p>
                            {{-- hrefの引数で検索 --}}
                            <p><a href="{{ action('UserController@delete', Auth::user()->id) }}" class="text-danger">アカウント削除</a></p>
                        </div>
                </div>
            </div>
        </div>
    @endauth
</div>

@endsection
