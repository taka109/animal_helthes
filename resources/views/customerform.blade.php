<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>相談投稿</title>
</head>
<body>
    @include('header')
    <form action = "customercomp" method = "POST">
        @csrf
        <div class ="data">
            <h3>タイトル</h3>
            <input type = "text" name = "title" class = "title" >
            @if($errors->has('title'))
                <li>タイトルは必須です</li>
            @endif
            <h3>相談内容</h3>
            <textarea  class= "body" id = "body" name = "body"></textarea><br/><br/>
            @if($errors->has('body'))
                <li>内容は必須です</li>
            @endif
            <button type = "submit" class = "btnSubmit" id = "btnSubmit">投稿</button>
        </div>
    </form>
    <div class ="info">
        <a href = "customerlist">相談一覧へ</a>
    </div>
    @include('footer')
</body>
</html>