@extends('layouts.default')

@section('page-header')
    ツイート一覧
@stop

@section('content')
    <div class="row">
        <div class="col-md-2">
            @if(auth()->check())
                <p>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ auth()->user()->name }}
                </p>
                <p>
                    <a href="{!! route('tweet.create') !!}" class="btn btn-primary">新しいツイートを投稿する</a>
                </p>
            @endif
        </div>
        <div class="col-md-10">
            <table class="table">
                <tbody>
                @foreach($tweets as $tweet)
                    <tr>
                        <td>
                            {{ $tweet->user->name }}: <a href="{!! route('tweet.show', ['id' => $tweet->id]) !!}">{{ $tweet->body }}</a>
                        </td>
                        @if(auth()->check())
                            <td class="text-right">
                                <a href="{!! route('tweet.edit', ['id' => $tweet->id]) !!}" class="btn btn-primary btn-sm">編集</a>
                            </td>
                            <td class="text-right">
                                <form action="{{ route('tweet.destroy', ['id' => $tweet->id]) }}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-danger btn-sm">削除</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $tweets->render() !!}
        </div>
    </div>
@stop
