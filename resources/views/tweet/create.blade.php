@extends('layouts.default')

@section('page-header')
    ツイート新規投稿
@stop

@section('content')
    @if (count($errors) > 0)
        @include('shared.errors')
    @endif
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('tweet_store') !!}" method="post">
                {!! csrf_field() !!}

                <input type="text" name="body" class="form-control" placeholder="ツイート本文を入力してください。" value="{{ old('body') }}"/>
                <button type="submit" class="btn btn-primary">投稿する</button>
            </form>
        </div>
    </div>
@stop
