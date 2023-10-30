<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>カレンダー登録登録</title>
</head>
<body>
    @include('header')
    <form action = "calendarcomp" method = "POST">
    @csrf
        <h3>{{$pets->name}}</h3>
        <div class ="data">
            <h3>日付</h3>
            <input type ="date" name ="date" class ="date">
            <input type ="hidden" name ="pets_id"  value ="{{$pets->id}}">
            @if($errors->has('date'))
            <li>{{$errors->first('date')}}</li>
            @endif
        </div>
        <div class ="data">
            <p>ごはん</p>
            <select name = "eat">
                <option value ="0">0回</option>
                <option value ="1">1回</option>
                <option value ="2">2回</option>
                <option value ="3">3回</option>
                <option value ="4">4回</option>
                <option value ="5">5回</option>
                <option value ="6">6回</option>
                <option value ="7">それ以上</option>
            </select>
        </div>
        <div class ="data">
            <p>備考</p>
            <textarea class ="" name ="body"></textarea>
            @if($errors->has('body'))
            <li>{{$errors->first('body')}}</li>
            @endif
        </div>
        <div class ="data">
            <button type = "submit" class = "btnSubmit" id = "btnSubmit">登録</button>
        </div>
        <div class ="data">
            <a href ="petinfo">ペットのページへ</a>
        </div>
    </form>
    @include('footer')
</body>
</html>