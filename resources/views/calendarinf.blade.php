<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>情報</title>
</head>
<body>
    @include('header')
    <h3>{{$pets->date}}</h3>
    <div class ="data">
        <h3>ごはん</h3>
        <p>{{$pets->eat}}回</p>    
    </div>
    <div class ="data">
        <h3>備考</h3>
        {{$pets->body}}
    </div>
    <div class = "data">
        <a href = "mypage">マイページへ</a>
    </div>
    @include('footer')
</body>
</html>