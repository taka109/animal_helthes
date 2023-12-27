<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>新規投稿</title>
</head>
<body>
    <div class = "data">
        <form action = "customeraction" method = "POST">
            <div class ="data">
                <p>タイトル</p>
                <input type = "text" name ="title" class = "title">
            </div>
            <div class ="data">
                <p>動物の種類</p>
                <select name = "count">
                <option value ="0"></option>
                <option value ="1"></option>
                <option value ="2"></option>
                <option value ="3"></option>
                <option value ="4"></option>
                <option value ="5"></option>
                <option value ="6"></option>
                <option value ="7"></option>
            </select>
            </div>
            <div class ="data">
                <p>名前</p>
                <input type = "text" name = "name" class = "name">
            </div>
            <div class = "data">
                <p>投稿</P>
                <textarea class= "textarea" id = "textarea" name = "textarea"></textarea><br/><br/>
                <input id="image" type="file" name="image">
                <button type = "submit" class = "btnSubmit" id = "btnSubmit">投稿</button>
            </div>
        </form>
    </div>
</body>
</html>