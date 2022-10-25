class ListsController < ApplicationController
  before_action :authenticate_user!

  def index
  end

  def show
    users = { id:1, nickname: "ぴよっち", age: 22 }
    render json: users
  end
end
