onLikeClick(comment) ;{
    if(comment.liked_by_user) {
      this.unlike(comment)
    }
    else {
      this.like(comment)
    }
}