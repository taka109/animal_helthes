<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>過去投稿一覧</title>
</head>
<body>
  @include('header')
    <h3>過去投稿</h3>
<table>
      <tr>
        <th>タイトル</th>
        <th>詳細</th>
        <th>投稿日</th>
        <th>消去</th>
      </tr> 
      @foreach($publices as $publice)
      @if($publice->users_id == Auth::user()->id && $publice->deleted_at == 0)
      <tr>
        <td>{{$publice->title}}</td>
        <td>
          <form action = 'post' method = 'post'>
            @csrf
            <input type='hidden' name = 'id' value = "{{$publice->id}}">
            <input type='submit'name='send' value='詳細' class = 'send'>
          </form>
        </td>
        <td>{{$publice->created_at}}</td>
        <td>
          <form action = 'postdelete' method = 'post'>
              @csrf
              <input type='hidden' name = 'id' value = "{{$publice->id}}">
              <input type='hidden' name = 'deleted_at' value = "1">
              <input type='submit'name='send' value='消去' class = 'send'>
          </form>
        </td>
      </tr>
      @endif
      @endforeach
    </table>
    <div class ="info">
      {{$publices->links('vendor.pagination.semantic-ui')}}
    </div>
    @include('footer')
</body>
</html>