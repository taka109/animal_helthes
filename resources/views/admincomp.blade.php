<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>管理者ログイン完了</title>
</head>
<body>
    @include('header')
    <h2>ログイン完了</h2>
    こんにちは<br>
    管理者としてログイン完了<br>
    @if(session('adminmsg'))
    {{ Session('adminmsg') }}<br />
    @endif
    <div class ="">
        <a href = "userlist">ユーザー一覧へ</a>
    </div>
</body>
</html>