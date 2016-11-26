<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="{{ route('tweet.index') }}" class="navbar-brand">マイアプリ</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li>
                    <a href="{{ route('auth.get_logout') }}">ログアウト</a>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.get_register') }}">ユーザ新規登録</a>
                </li>
                <li>
                    <a href="{{ route('auth.get_login') }}">ログイン</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
