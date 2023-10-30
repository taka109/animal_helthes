<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>返信内容</title>
</head>
<body>
    @include('header')
    <h2>返信内容</h2>
    <div class ="info">
        <p>返信日</p>
        <p>{{$replies->created_at}}</p>
    </div>
    <div class ="info">
        <p>内容</p>
        {{$replies->body}}
    </div>
    <div class="info">
        <a href = "customerlist">相談一覧へ</a>
    </div>
    @include('footer')
</body>
</html>