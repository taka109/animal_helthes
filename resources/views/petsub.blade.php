<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>ペットの登録</title>
</head>
<body>
    @include('header')
    <form action ="petsubcomp" method = "POST">
        @csrf
        <div class ="data">
            <h3>ペットの名前</h3>
            <input type ="text" name ="name" class ="name" value ="ぽち">
            @if($errors->has('name'))
            <li>名前は必須です</li>
            @endif
        </div>
        <div class ="data">
            <h3>生年月日</h3>
            <input type ="date" name ="date" class ="date">
            @if($errors->has('date'))
            <li>生年月日は必須です</li>
            @endif
        </div>
        <div class ="data">
            <h3>動物の種類</h3>
            <select name = "animals_id">
                @foreach($results as $result)
                <option value ="{{ $result->id }}">{{$result->type}}</option>
                @endforeach
            </select>
        </div>
        <div class ="data">
            <h3>体重</h3>
            <input type ="number" name ="weight" class ="weight">g
            @if($errors->has('weight'))
            <li>体重は必須項目です。</li>
            @endif
        </div><br>
        <div class ="data">
            <input type ="submit" name ="submit" class ="submit" value ="登録">
        </div>
        <div class ="data">
            <a href ="mypage">マイページへ</a>
        </div>
    </form>
    @include('footer')
</body>
</html>