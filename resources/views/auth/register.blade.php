@extends('layouts.default')

@section('page-header')
    ユーザ新規登録
@stop

@section('content')
    @if (count($errors) > 0)
        @include('shared.errors')
    @endif
    <form method="POST" action="{{ route('auth.post_register') }}">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="name" class="form-label">名前</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirm" class="form-label">パスワード（確認）</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div>
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>
@stop
