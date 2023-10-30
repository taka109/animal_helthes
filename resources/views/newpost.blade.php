<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>新規投稿</title>
</head>
<body>
    @include('header')
    <h2>新規投稿</h2>
    <form action ="postcomplete" method = "POST" enctype="multipart/form-data">
    @csrf
        <div class ="data">
            <h3 class = "">タイトル</h3>
            <input type = "text" name = "title" class = "title">
            <input type ="hidden" name ="users_id"  value ="{{Auth::user()->id}}">
            @if($errors->has('title'))
            <li>タイトルは必須です</li>
            @endif
        </div>
        <div class ="data">
            <p>動物の種類</p>
            <select name = "animals_id">
                @foreach($results as $result)
                <option value ="{{ $result->id }}">{{$result->type}}</option>
                @endforeach
            </select>
        </div>
        <div class ="data">
            <h3 class = "">名前</h3>
            <input type = "text" name = "name" class = "name" value = "{{$pets->name}}">
            @if($errors->has('name'))
            <li>名前は必須です</li>
            @endif
        </div>
        <div class ="data">
            <h3 class = "">投稿内容</h3>
            <textarea class= "body" id = "body" name = "body"></textarea><br/><br/>
            @if($errors->has('body'))
            <li>投稿内容は必須です</li>
            @endif
            <input type = "file" name = "image" class = "media">
            @if($errors->has('image'))
            <li>画像は必須です</li>
            @endif
        </div>
        <div class = "data">
            <button type = "submit" class = "btnSubmit" id = "btnSubmit">登録</button>
        </div>
    </form>
    @include('footer')
</body>
</html>