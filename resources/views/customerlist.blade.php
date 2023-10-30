<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <title>相談一覧</title>
</head>
<body>
    @include('header')
    <h2>相談ページ</h2>
    <div class ="info">
        <h3>相談内容</h3>
        <div class="col-sm-4" style="padding:10px 0; padding-left:0px;">
            <form class="form-inline" action="{{url('/crud.customerlist')}}">
                <div class="form-group">
                <input type="text" name="keyword" value="" class="form-control" placeholder="タイトルを入力してください">
                </div>
                <input type="submit" value="検索" class="btn btn-info">
            </form>
        </div>
    </div>
    <div class = "table">
        <table class = "">
            <tr>
                <th>タイトル</th>
                <th>詳細</th>
            </tr>
            @foreach($customers as $customer)
            @if($customer->deleted_at == 0)
            <tr>
                <td>{{$customer->title}}</td>
                <td>
                    <form action = 'customerinfo' method = 'post'>
                     @csrf
                        <input type='hidden' name = 'id' value = "{{$customer->id}}">
                        <input type='submit'name='send' value='詳細' class = 'send'>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </table> 

    </div>
    <div class ="data">
        <a href = "customerform">相談投稿</a>
    </div>
    @include('footer')
</body>
</html>