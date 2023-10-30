<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Script -->
        <script src="{{ asset('js/app.js') }}"></script>
    <title>ペットの情報</title>
</head>
<body>
    @include('header')
    <h3>{{$pets->name}}</h3>
    <div class = "info">
        <h4>年齢</h4>
        <p>{{$pets->age}}歳</p>
    </div>
    <div class ="info">
        <h4>体重</h4>
        <p>{{$pets->weight}}g</p>
    </div>
    <div class ="info">
        <h4>生年月日</h4>
        <p>{{$pets->birth}}</p>
    </div>
    <div class = "info">
        <a href = "calendarsub">日記登録</a>
    </div>

    <div class ="info">
        <a href ="mypage">マイページへ</a>
    </div>
    @include('footer')
</body>
</html>