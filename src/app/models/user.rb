class User < ApplicationRecord
  # Include default devise modules. Others available are:
  # :confirmable, :lockable, :timeoutable, :trackable and :omniauthable
  #has_many :stock, foreign_key "registUser"
  #has_many :stock, foreign_key "updateUser"

  devise :database_authenticatable, :registerable,
         :recoverable, :rememberable, :validatable
end
