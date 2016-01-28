class Admin::CommentsController < Admin::BaseController
  def index
    @comments = Comment.where(my_thread_id: params[:thread_id]).includes(:user, :my_thread, :favorite).order('updated_at DESC')
    @thread_name = MyThread.find(params[:thread_id]).title
    @comment = Comment.new
  end

  def destroy
    if Comment.find(params[:id]).destroy
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
  end
end
