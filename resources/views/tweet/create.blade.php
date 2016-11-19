<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Twitter風アプリ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<form action="{!! route('tweet_store') !!}" method="post">
    <div class="container">
        <div class="page-header">
            <h1>ツイート新規投稿</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! csrf_field() !!}

                <input type="text" name="body" class="form-control" placeholder="ツイート本文を入力してください。"/>
                <button type="submit" class="btn btn-primary">投稿する</button>
            </div>
        </div>
    </div>
</form>
</body>
</html>
