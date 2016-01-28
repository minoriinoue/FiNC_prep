class Comment < ActiveRecord::Base
  belongs_to :my_thread
  belongs_to :user
  has_many :favorite, dependent: :destroy
end
