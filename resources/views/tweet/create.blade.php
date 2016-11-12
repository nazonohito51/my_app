<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Twitter風アプリ</title>
</head>
<body>
<form action="{!! url('tweet') !!}}" method="post">
    <label for="body">ツイート本文：</label>
    <input type="text" name="body"/>

    <button type="submit">投稿する</button>
</form>
</body>
</html>
