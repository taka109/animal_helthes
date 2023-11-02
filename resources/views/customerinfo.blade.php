<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>相談詳細</title>
</head>
<body>
    @include('header')
    <h2>{{$customers->title}}</h2> 
    <div class ="">
        <p>内容</p>
        {{$customers->body}}
    </div>
    <div class = "data">
        <p>返信一覧</p>
    </div>
    <div class ="data">
        <table class = "data">
            <tr>
                <th>返信日</th>
                <th>詳細</th>
            </tr>
            @foreach($replies as $reply)
            @if($reply->customers_id == $customers->id)
            <tr>
                <td>{{$reply->created_at}}</td>
                <td>
                    <form action = 'replyinfo' method = 'post'>
                        @csrf
                        <input type='hidden' name = 'id' value = "{{$reply->id}}">
                        <input type='submit'name='send' value='詳細' class = 'send'>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </table>
        <div class ="info">
      {{$replies->links('vendor.pagination.semantic-ui')}}
    </div>
    </div>
    <div class ="data">
        <a href = "customerlist">相談一覧ページへ</a><br>
        <form action = 'customerreply' method = 'post'>
             @csrf
            <input type='hidden' name = 'id' value = "{{$customers->id}}">
            <input type='submit'name='send' value='相談に返信' class = 'send'>
        </form>
    </div>
    @include('footer')
</body>
</html>
