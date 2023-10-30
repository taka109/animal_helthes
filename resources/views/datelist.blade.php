<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>健康管理</title>
</head>
<body>
  @include('header')
<table>
      <tr>
        <th>投稿日</th>
        <th>詳細</th>
        <th>消去</th>
      </tr>
      @foreach($dates as $date)
      @if($date->users_id == Auth::user()->id && $date->deleted_at == 0)
      <tr>
        <td>{{$date->date}}</td>
        <td>
          <form action = 'calendarinf' method = 'post'>
            @csrf
            <input type='hidden' name = 'id' value = "{{$date->id}}">
            <input type='submit'name='send' value='詳細' class = 'send'>
          </form>
        </td>
        <td>
          <form action = 'datedelete' method = 'post'>
              @csrf
              <input type='hidden' name = 'id' value = "{{$date->id}}">
              <input type='hidden' name = 'deleted_at' value = "1">
              <input type='submit'name='send' value='消去' class = 'send'>
          </form>
        </td>
      </tr>
      @endif
      @endforeach
    </table>
    <div class ="info">
      {{$dates->links('vendor.pagination.semantic-ui')}}
    </div>
    @include('footer')
</body>
</html>