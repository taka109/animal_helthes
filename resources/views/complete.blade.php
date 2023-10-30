<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>ログイン完了</title>
</head>
<body>
@include('header')
<h1>ログインしました</h1>
<br><br>
<h3>{{Auth::user()->name}}さんログイン完了しました</h3><br><br>
<div class ="alink">
    <a href ="index">トップページへ</a>
</div>
@include('footer')
</body>
</html>