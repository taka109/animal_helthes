<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>ユーザー一覧</title>
</head>
<body>
    @include('header')
    <h2>一覧</h2>

    <table class ="">
        <tr>
            <th>ユーザー名</th>
            <th>メールアドレス</th>
            <th>消去</th>
        </tr>
        @foreach($users as $user)
        @if($user->deleted_at == 0)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <form action="userdelete" method="POST">
                @csrf
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <input type='hidden' name = 'deleted_at' value = "1">
                    <input type="submit" class="btn btn-danger btn-dell" value="削除" onclick='return confirm("消去しますか？");'>
                </form>
            </td>
        </tr>
        @endif
        @endforeach
    </table>
    <div class ="info">
      {{$users->links('vendor.pagination.semantic-ui')}}
    </div>
    @include('footer')
</body>
</html>