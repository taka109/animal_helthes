<template>
  <div class="like-component">
   <div class="p-like-area" > 
  <!-- Font Awesome使います -->
    <i
      class="fas fa-heart fa-2x c-icon__like"
       
      :class="{ u_liked: this.clickFlg }"
      @click="addLike"
    ></i>
<!-- いいね総数表示 -->
    <span class="like-num" :class="{ liked: this.clickFlg }">{{ likeNumber }}</span>
  </div>
</div>
</template>

<script>
export default {
  props: ['item_id','my_like_check','like_num','user_id','axios_path'],
  data: function () {
    return {
      likeNumber: this.like_num,
      clickFlg: false,
    };
  },
//自分が気になるを押してるアイデアなら最初から色つける
  created() {
    if(this.my_like_check){
      this.clickFlg = true;
    }
    
  },
  methods: {
 //いいね追加または解除処理(いいね総数の増減と色の付け外しのみ)
    addLike() {
      this.clickFlg = !this.clickFlg;
      if (this.clickFlg) {
        ++ this.likeNumber;
      } else {
        -- this.likeNumber;
      }
     //axiosでLikeController内の処理を行う
      axios
        .post(this.axios_path)
        .then((response) => {
    
        })
        .catch(function (err) {
          console.log(err);
        });
    },
   
  },
};
</script>
