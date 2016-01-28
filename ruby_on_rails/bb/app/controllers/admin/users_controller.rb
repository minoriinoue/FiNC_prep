class Admin::UsersController < Admin::BaseController
  def index
    @users = User.all
  end

  def show
    @user = User.find(params[:id])
    @followee_number = Follow.where(followee_id: params[:id]).count
    @following_number = Follow.where(follower_id: params[:id]).count
  end

  def destroy
    if User.find(params[:id]).destroy
      Follow.where(followee_id: params[:id]).destroy_all
      Follow.where(follower_id: params[:id]).destroy_all
      @message = 'Succeeded in deleting a user.'
      @users = User.all
      render :index
    else
      @message = 'Failed to delete a user.'
      render :index
    end
  end
end
