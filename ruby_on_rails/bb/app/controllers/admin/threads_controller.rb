class Admin::ThreadsController < Admin::BaseController
  def index
    if params[:status].present?
      following_user_id = Follow.where(follower_id: current_user.id).pluck(:followee_id)
      @threads = MyThread.where(user_id: following_user_id).includes(:user).order('updated_at DESC')
    else
      @threads = MyThread.includes(:user).order('updated_at DESC')
    end
  end

  def destroy
    if MyThread.find(params[:id]).destroy
      @message = 'Successfully deleted a thread.'
      @threads = MyThread.includes(:user).order('updated_at DESC')
      render :index
    else
      @message = 'Failed to delete a thread.'
      @threads = MyThread.includes(:user).order('updated_at DESC')
      render :index
    end
  end
end
