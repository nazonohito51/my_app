@extends('layouts.default')

@section('page-header')
    ツイート一覧
@stop

@section('content')
    <div class="row">
        <div class="col-md-2">
            @can('create-tweet')
                <p>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ Auth::user()->name }}
                </p>
                <p>
                    <a href="{!! route('tweet.create') !!}" class="btn btn-primary">新しいツイートを投稿する</a>
                </p>
            @endcan
        </div>
        <div class="col-md-10">
            <table class="table">
                <tbody>
                    @foreach($tweets as $tweet)
                        <tr>
                            <td>
                                {{ $tweet->user->name }}: {{ $tweet->body }}
                            </td>
                            <td class="text-right">
                                <a href="{!! route('tweet.show', ['id' => $tweet->id]) !!}" class="btn btn-primary">詳細</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $tweets->render() !!}
        </div>
    </div>
@stop
