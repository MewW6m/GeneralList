class ListsController < ApplicationController
  before_action :authenticate_user!

  def index
  end

  def show
    users = {"zaikoList":[{"zaikoCode":"1","itemCode":"1","itemName":"itemName1","status":"棚卸","registUser":"山田太郎","registMail":"sample@test.com","registOrgName":"総務部","registDate":"2022/10/21 13:01","updateUser":"清水啓介","updateMail":"sample@test.com","updateOrgName":"経理部","updateDate":"2021/12/31 13:21"},{"zaikoCode":"2","itemCode":"2","itemName":"itemName1","status":"棚卸","registUser":"山田太郎","registMail":"sample@test.com","registOrgName":"総務部","registDate":"2022/10/21 13:01","updateUser":"清水啓介","updateMail":"sample@test.com","updateOrgName":"経理部","updateDate":"2021/12/31 13:21"}], total: 2}
    render json: users
  end
end
