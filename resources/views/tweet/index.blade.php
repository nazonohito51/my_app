<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Twitter風アプリ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>ツイート一覧</h1>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a href="{!! url('/tweet/create') !!}" class="btn btn-primary">新しいツイートを投稿する</a>
            </div>
            <div class="col-md-10">
                <table class="table">
                    <tbody>
                        @foreach($tweets as $tweet)
                        <tr>
                            <td>{{ $tweet->body }}</td>
                            <td class="text-right">{{ $tweet->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
