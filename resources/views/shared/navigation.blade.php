<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="{{ route('tweet.index') }}" class="navbar-brand">マイアプリ</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                @if(Auth::check())
                    <a href="{{ route('auth.get_logout') }}">ログアウト</a>
                @else
                    <a href="{{ route('auth.get_login') }}">ログイン</a>
                @endif
            </li>
        </ul>
    </div>
</nav>
