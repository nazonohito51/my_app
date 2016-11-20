@extends('layouts.default')

@section('page-header')
    ツイート一覧
@stop

@section('content')
    <div class="row">
        <div class="col-md-2">
            <a href="{!! route('tweet.create') !!}" class="btn btn-primary">新しいツイートを投稿する</a>
        </div>
        <div class="col-md-10">
            <table class="table">
                <tbody>
                @foreach($tweets as $tweet)
                    <tr>
                        <td>
                            <a href="{!! route('tweet.show', ['id' => $tweet->id]) !!}">{{ $tweet->body }}</a>
                        </td>
                        <td class="text-right">
                            <a href="{!! route('tweet.edit', ['id' => $tweet->id]) !!}" class="btn btn-primary">編集</a>
                        </td>
                        <td class="text-right">
                            <form action="{{ route('tweet.destroy', ['id' => $tweet->id]) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
