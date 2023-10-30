$( function () {
  let like = $('.good-toggle'); //good-toggleのついたiタグを取得し代入。
  let likeReviewId; //変数を宣言
  like.on('click', function () { //onはイベントハンドラー
    let $this = $(this); //this=イベントの発火した要素＝iタグを代入
    likeReviewId = $this.data('publice_id'); //iタグに仕込んだdata-publice-idの値を取得
    //ajax処理スタート
    $.ajax({
      headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
      url: '/index', //通信先アドレスで、このURLをあとでルートで設定
      method: 'POST', //HTTPメソッドの種別を指定.
      data: { //サーバーに送信するデータ
        'publice_id': likeReviewId //いいねされた投稿のidを送る
      },
    })
    //通信成功した時の処理
    .done(function (data) {
      $this.toggleClass('gooded'); //goodedクラスのON/OFF切り替え。
      $this.next('.like-counter').html(data.publice_likes_count);
    })
    //通信失敗した時の処理
    .fail(function () {
      console.log('fail'); 
    });
  });
  });
