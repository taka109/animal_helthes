<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>マイページ</title>
</head>
<body>
    @include('header')
    <div class ="username">
        <h3>{{Auth::user()->name}}</h3>
    </div>
    @empty($pets->users_id)
    <div class ="migration">
        <a href = "petsub">ペットの登録</a>
    </div>
    @endempty
    @isset($pets->users_id)
    <div class ="migration">
        <a href = "petedit">ペットの編集</a>
    </div>
    <div class ="migration">
        <a href ="petinfo">ペットの情報</a>
    </div>
    <div class = "migration">
        <a href = "newpost">新規投稿</a>
    </div>
    <div class ="migration">
        <a href = "mypost">投稿一覧</a>
    </div>
    <div class ="migration">
        <a href = "datelist">日記一覧</a>
    </div>
    @endisset
    <div class ="migration">
        <a href = "customerlist">相談一覧</a>
    </div>
    <div class ="migration">
        <a href = "mycustomer">相談投稿一覧</a>
    </div>
    @include('footer')
</body>
</html>