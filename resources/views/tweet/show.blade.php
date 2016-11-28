@extends('layouts.default')

@section('page-header')
    ツイート詳細
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>ツイート内容</h3>
            <p>{{ $tweet->body }}</p>
            <h3>ハッシュタグ</h3>
            <p>
                <ul class="list-inline">
                    <li>
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                    </li>
                    @foreach($tweet->hash_tags as $hash_tag)
                        <li>
                            <span class="label label-info">{{ $hash_tag->name }}</span>
                        </li>
                    @endforeach
                </ul>
            </p>
            <h3>投稿者</h3>
            <p>{{ $tweet->user->name }}</p>
            <h3>投稿日時</h3>
            <p>{{ $tweet->created_at }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
    </div>
@stop
