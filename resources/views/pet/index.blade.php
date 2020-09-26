@extends('layouts.admin')

@section('title', 'ペット一覧')

@section('content')

    <div class="container">
        <div class="row">
            <h4>ペット一覧</h4>
        </div>
        <div class="row">
            <div class="col-md-12 my-3 pl-0">
                <a href="{{ action('PetController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 mx-auto border">
                <div class="row">
                    <table class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">名前</th>
                                <th width="20%">種類</th>
                                <th width="20%">性別</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($pets as $pet)
                                <tr>
                                    <th>{{ $pet->id }}</th>
                                    <td>{{ Str::limit($pet->name, 50) }}</td>
                                    <td>{{ Str::limit($pet->type, 100) }}</td>
                                    <td>{{ Str::limit($pet->gender, 100) }}</td>
                                    <td><a href="{{ action('PetController@edit', ['id' => $pet->id]) }}" role="button" class="btn btn-info btn-sm">編集</a></td>
                                    <td><a href="{{ action('PetController@delete', ['id' => $pet->id]) }}" role="button" class="btn btn-danger btn-sm">削除</a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
