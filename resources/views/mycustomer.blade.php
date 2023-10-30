<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>My相談リスト</title>
</head>
<body>
  @include('header')
<table>
      <tr>
        <th>タイトル</th>
        <th>投稿日</th>
        <th>詳細</th>
        <th>消去</th>
      </tr>
      @foreach($customers as $customer)
      @if($customer->users_id == Auth::user()->id && $customer->deleted_at == 0)
      <tr>
        <td>{{$customer->title}}</td>
        <td>{{$customer->created_at}}</td>
        <td>
          <form action = 'customerinfo' method = 'post'>
            @csrf
            <input type='hidden' name = 'id' value = "{{$customer->id}}">
            <input type='submit'name='send' value='詳細' class = 'send'>
          </form>
        </td>
        <td>
          <form action = 'customerdelete' method = 'post'>
              @csrf
              <input type='hidden' name = 'id' value = "{{$customer->id}}">
              <input type='hidden' name = 'deleted_at' value = "1">
              <input type='submit'name='send' value='消去' class = 'send'>
          </form>
        </td>
      </tr>
      @endif
      @endforeach
    </table>
    <div class ="info">
      {{$customers->links('vendor.pagination.semantic-ui')}}
    </div>
    @include('footer')
</body>
</html>