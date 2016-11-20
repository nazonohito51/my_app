@extends('layouts.default')

@section('page-header')
    ログイン
@stop

@section('content')
    @if (count($errors) > 0)
        @include('shared.errors')
    @endif
    <form method="POST" action="{{ route('auth.post_login') }}">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <input type="checkbox" name="remember" > ログインを継続する
        </div>

        <div>
            <button type="submit" class="btn btn-primary">ログイン</button>
        </div>
    </form>
@stop
