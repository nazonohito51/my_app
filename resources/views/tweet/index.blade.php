@extends('layouts.default')

@section('page-header')
    ツイート一覧
@stop

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{!! route('tweet_create') !!}" class="btn btn-primary">新しいツイートを投稿する</a>
        </div>
        <div class="col-md-10">
            <table class="table">
                <tbody>
                @foreach($tweets as $tweet)
                    <tr>
                        <td>
                            <a href="{!! route('tweet_show', ['id' => $tweet->id]) !!}">{{ $tweet->body }}</a>
                        </td>
                        <td class="text-right">
                            <a href="{!! route('tweet_edit', ['id' => $tweet->id]) !!}" class="btn btn-primary">編集</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
