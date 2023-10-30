<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/be3ac83343.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel = "stylesheet" type="text/css" href="/css/styles.css">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>投稿ページ</title>
</head>
<body>
<div id="app">
    <example-component></example-component>
</div>
  @include('header')
  <main>
    <h1>一覧</h1>
    <table class >
      <tr>
        <th>タイトル</th>
        <th>詳細</th>
        <th>投稿日</th>
        <th>いいね数</th>
      </tr>
      @foreach($publices as $publice)
      @if($publice->deleted_at == 0)
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
          @auth
            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
            @if (!$publice->isLikedBy(Auth::user()))
              <span class="likes">
                  <i class="fa-sharp fa-solid fa-star good-toggle" data-publice_id="{{$publice->id}}"></i>
                <span class="like-counter">{{$publice->likes_count}}</span>
              </span><!-- /.likes -->
            @else
              <span class="likes">
                  <i class="fa-sharp fa-solid fa-star good-toggle gooded" data-publice_id="{{$publice->id}}"></i>
                <span class="like-counter">{{$publice->likes_count}}</span>
              </span><!-- /.likes -->
            @endif
          @endauth
          @guest
            <span class="likes">
                <i class="fa-sharp fa-solid fa-star"></i>
              <span class="like-counter">{{$publice->likes_count}}</span>
            </span><!-- /.likes -->
          @endguest
        </td>
      </tr>
      @endif
      @endforeach
    </table>
    <div class ="info">
      {{$publices->links('vendor.pagination.semantic-ui')}}
    </div>
  </main>
  @include('footer')

  <script src="{{asset('/js/like.js')}}"></script>
</body>
</html>