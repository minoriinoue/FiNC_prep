class CommentsController < UserBaseController
  def index
    @comments = Comment.where(my_thread_id: params[:thread_id]).includes(:user, :my_thread, :favorite).order('updated_at DESC')
    @thread_name = MyThread.find(params[:thread_id]).title
    @comment = Comment.new
  end

  def create
    comment_params = params.require(:comment).permit(:comment, :my_thread_id)
    comment_params[:user_id] = current_user.id
    @comment = Comment.new(comment_params)
    if @comment.save
      @comment = Comment.new
      @comments = Comment.where(my_thread_id: params[:thread_id]).includes(:user, :my_thread).order('updated_at DESC')
      @thread_name = MyThread.find(params[:thread_id]).title
      @fav = Favorite.where(user_id: current_user.id).pluck(:comment_id)
      render :index
    else
      @comments = Comment.where(my_thread_id: params[:thread_id]).includes(:user, :my_thread).order('updated_at DESC')
      @thread_name = MyThread.find(params[:thread_id]).title
      @fav = Favorite.where(user_id: current_user.id).pluck(:comment_id)
      render :index
    end
  end

  def destroy
    # Check the request is right by checking the current user and the author of the comment_id
    # is same.
    comment = Comment.find(params[:id])
    if current_user.id == comment.user_id
      if comment.destroy
        @comments = Comment.where(my_thread_id: params[:thread_id]).includes(:user, :my_thread, :favorite).order('updated_at DESC')
        @thread_name = MyThread.find(params[:thread_id]).title
        @comment = Comment.new
        render :index
      else
        @message = 'Failed to delete a thread.'
        @comments = Comment.where(my_thread_id: params[:thread_id]).includes(:user, :my_thread, :favorite).order('updated_at DESC')
        @thread_name = MyThread.find(params[:thread_id]).title
        @comment = Comment.new
        render :index
      end
    else
      @message = 'Failed to delete a thread.'
      @comments = Comment.where(my_thread_id: params[:thread_id]).includes(:user, :my_thread, :favorite).order('updated_at DESC')
      @thread_name = MyThread.find(params[:thread_id]).title
      @comment = Comment.new
      render :index
    end  
  end

  def edit
    @comment = Comment.find(params[:id])
    @original_comment = @comment.comment
  end

  def update
    comment_params = params.require(:comment).permit(:my_thread_id, :id, :comment)
    @comment = Comment.find(comment_params[:id])
    if !comment_params[:comment].empty?
      @comment.comment = comment_params[:comment]
      if @comment.comment == params[:comment][:original_comment]
        @message = 'Remained Same'
        render :edit
        return
      end
    end

    if @comment.save
      @message = 'Successfully updated.'
      render :edit
    else
      @message = 'Failed to update.'
      render :edit
    end
  end
end
