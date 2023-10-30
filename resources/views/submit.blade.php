<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>新規登録</title>
</head>
<body>
@include('header')
    <h2>新規登録</h2>
    <form action = "subcomplete" method = "post">
    @csrf
        <div class = "">
            <label for =""><span>名前</span><br>
                <input type ="text" name = "name" class = "name"><br>
            </label>
        </div>
            <label for =""><span>メールアドレス</span><br>
                <input type ="email" name = "email" class = "email"><br>
            </label>
        </div>
        <div class ="">
            <label for =""><span>パスワード</span><br>
                <input type ="password" name = "password" class = "pass"><br>
            </label>
        </div>
        <div class = "">
            <input type = "submit" value = "登録" class = "submit">
        </div>
        <div class = "">
            <input type = "hidden" value = "0" name = "role" class = "submit">
        </div>
        <div class = "">
            <input type = "hidden" value = "0" name = "delete" class = "submit">
        </div>
        <div class = "">
            <a href ="login" class ="">ログインページへ</a><br>
        </div>
    </form>
@include('footer')
</body>
</html>