@extends('layouts.default')

@section('page-header')
    ツイート詳細
@stop

@section('content')
    <div class="col-md-12">
        <h3>ツイート内容</h3>
        <p>{{ $tweet->body }}</p>
        <h3>投稿日時</h3>
        <p>{{ $tweet->created_at }}</p>
    </div>
@stop
