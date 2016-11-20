@extends('layouts.default')

@section('page-header')
    ツイート編集
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                {!! csrf_field() !!}

                <input type="text" name="body" class="form-control" placeholder="ツイート本文を入力してください。" value="{{ $tweet->body }}"/>
                <button type="submit" class="btn btn-primary">編集する</button>
            </form>
        </div>
    </div>
@stop
