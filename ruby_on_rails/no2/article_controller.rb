class ArticlesController < ApplicationController
  def show
  @user = current_user
  @article_title = Article.where(user_id: @user.id).first.title
  @article_text = Article.where(user_id: @user.id).first.text
  @comments = Comment.where(article_id: Aricle.where(user_id: @user.id))
  end
end
