@extends('layouts.default')

@section('page-header')
    ツイート詳細
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>ツイート内容</h3>
            <p>{{ $tweet->body }}</p>
            <h3>投稿者</h3>
            <p>{{ $tweet->user->name }}</p>
            <h3>投稿日時</h3>
            <p>{{ $tweet->created_at }}</p>
        </div>
        @can('update-tweet', $tweet)
            <a href="{!! route('tweet.edit', ['id' => $tweet->id]) !!}" class="btn btn-primary">編集</a>
        @endcan
        @can('delete-tweet', $tweet)
            <form action="{{ route('tweet.destroy', ['id' => $tweet->id]) }}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        @endcan
    </div>
@stop
