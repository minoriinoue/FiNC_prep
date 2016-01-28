class FollowsController < UserBaseController
  def create
    follow_params = params.permit(:follower_id, :followee_id)
    @follow = Follow.new(follow_params)
    if @follow.save
      @user = User.find(follow_params[:followee_id])
      @follow = Follow.find_by(follower_id: current_user.id, followee_id: follow_params[:followee_id])
      render 'users/show'
    else
      @message = 'Failed to follow this user.'
      @user = User.find(follow_params[:followee_id])
      @follow = Follow.find_by(follower_id: current_user.id, followee_id: follow_params[:followee_id])
      render 'users/show'
    end
  end

  def destroy
    if current_user.id == Follow.find(params[:id]).follower_id
      if Follow.find(params[:id]).destroy
        @user = User.find(params[:followee_id])
        #@message = nil
        #@follow = nil
        render 'users/show'
      else
        @message = 'Failed to unfollow this user.'
        @user = User.find(follow_params[:followee_id])
        @follow = Follow.find_by(follower_id: current_user.id, followee_id: params[:followee_id])
        render 'users/show'
      end
    else
      @message = 'Failed to unfollow this user.'
      @user = User.find(follow_params[:followee_id])
      @follow = Follow.find_by(follower_id: current_user.id, followee_id: params[:followee_id])
      render 'users/show'
    end
  end

  def index
    if params[:status] == 'followed'
      @page_title = 'Followers'
      follower_ids = Follow.where(followee_id: params[:user_id]).pluck(:follower_id)
      @users = User.where(id: follower_ids)
    else
      @page_title = 'Following'
      following_ids = Follow.where(follower_id: params[:user_id]).pluck(:followee_id)
      @users = User.where(id: following_ids)
    end
  end
end
