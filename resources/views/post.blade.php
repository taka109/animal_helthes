<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>投稿一覧</title>
</head>
<body>
    @include('header')
    <h2>タイトル</h2>
    <div class ="info">
        <p>{{$publices->title}}</p>
    </div>
    <h3>内容</h3>
    <div class ="info">
        <div>
            {!! nl2br(htmlspecialchars($publices->body)) !!}
        </div><br><br>
        @if($publices->image != null)
        <div class = "gazou">
            <img src ="{{ asset('storage/img/'.$publices->image)}}"></img>
        </div>
        @endif
    </div><br>
    <div class = "info">
        {{$publices->created_at}}<br>
    </div><br><br>
    @include('footer')
</body>
</html>