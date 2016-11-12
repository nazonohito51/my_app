<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Twitter風アプリ</title>
</head>
<body>
    <a href="{!! url('/tweet/create') !!}">新しいツイートを投稿する</a>
    <table>
        <tbody>
            @foreach($tweets as $tweet)
            <tr>
                <td>{{ $tweet->body }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
