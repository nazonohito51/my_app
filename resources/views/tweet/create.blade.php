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
            <form action="{!! route('tweet.store') !!}" method="post">
                {!! csrf_field() !!}

                <div class="form-group row">
                    <label class="col-xs-2 col-form-label">ツイート本文</label>
                    <div class="col-xs-10">
                        <input type="text" name="body" class="form-control" placeholder="ツイート本文を入力してください。" value="{{ old('body') }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-2 col-form-label">ハッシュタグ１</label>
                    <div class="col-xs-3">
                        <input type="text" name="hash_tag[]" class="form-control" placeholder="ハッシュタグを入力してください。" value="{{ old('hash_tag.0') }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-2 col-form-label">ハッシュタグ２</label>
                    <div class="col-xs-3">
                        <input type="text" name="hash_tag[]" class="form-control" placeholder="ハッシュタグを入力してください。" value="{{ old('hash_tag.1') }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-2 col-form-label">ハッシュタグ３</label>
                    <div class="col-xs-3">
                        <input type="text" name="hash_tag[]" class="form-control" placeholder="ハッシュタグを入力してください。" value="{{ old('hash_tag.2') }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary">投稿する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
