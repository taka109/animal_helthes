<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>相談返信ページ</title>
</head>
<body>
    @include('header')
    <form action = "replycomp" method = "POST">
        @csrf
        <h3>返信内容</h3>
        <div class = "data">
            <input type='hidden' name = 'id' value = "{{$customers->id}}">
            <textarea  class= "body" id = "body" name = "body"></textarea><br/><br/>
        </div>
        <div class ="data">
            <button type = "submit" class = "btnSubmit" id = "btnSubmit">登録</button>
        </div>
    </form>
    <div class ="data">
        <a href ="customerlist">相談一覧へ</a>
    </div>
    @include('footer')
</body>
</html>