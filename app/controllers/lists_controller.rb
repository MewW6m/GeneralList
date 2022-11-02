class ListsController < ApplicationController
  before_action :authenticate_user!

  def index
  end

  def show
    sql = ""
    sql += createSelectQuery()
    sql += createFromJoinQuery()
    sql += createWhereQuery(params[:itemCode], params[:itemName], params[:status], params[:registUser], params[:updateUser])
    sql += createOrderbyQuery(params[:sort], params[:order])
    sql += createLimitOffsetQuery(params[:page])

    stock = ActiveRecord::Base.connection.select_all(sql).to_a
    total = stock[0]['totalCount']
    result = {zaikoList: stock, total: total}
    #logger.debug(result)

    render json: result
  end

  private

  def createSelectQuery()
    return "
      SELECT 
        count(*) over() as totalCount,
        stocks.id as zaikoCode, 
        stocks.itemCode as itemCode, 
        a.name as itemName, 
        stocks.status as status, 
        b.name as registUser, 
        b.email as registMail, 
        d.name as registOrgName, 
        DATE_FORMAT(stocks.created_at, '%Y-%m-%d %H:%i') as registDate, 
        c.name as updateUser, 
        c.email as updateMail, 
        e.name as updateOrgName, 
        DATE_FORMAT(stocks.updated_at, '%Y-%m-%d %H:%i') as updateDate "
  end
  def createFromJoinQuery()
    return "
      FROM stocks 
      INNER JOIN item_masters a ON stocks.itemCode = a.id 
      INNER JOIN users b ON stocks.registUser = b.id 
      INNER JOIN users c ON stocks.updateUser = c.id 
      INNER JOIN department_masters d ON b.departmentId = d.id 
      INNER JOIN department_masters e ON c.departmentId = e.id "
  end
  def createWhereQuery(itemCode, itemName, status, registUser, updateUser)
    query = ""
    whereFlag = (itemCode != "" || itemName != "" || status != "" || registUser != "" || updateUser != "")
    if whereFlag then
      query += "WHERE "
    end
    if itemCode != "" then
      query += format('stocks.itemCode = "%s" ', itemCode)
    end
    if itemName != "" then
      query += format('a.name like "%%%s%%" ', itemName)
    end
    if status != "" then
      query += format('stocks.status = "%s" ', status)
    end
    if registUser != "" then
      query += format('b.name like "%%%s%%" ', registUser)
    end
    if updateUser != "" then
      query += format('c.name like "%%%s%%" ', updateUser)
    end
    return query
  end
  def createOrderbyQuery(sort, order)
    return format("ORDER BY %s %s ", sort, order)
  end
  def createLimitOffsetQuery(page)
    offset = (page.to_i - 1) * 30
    return format("LIMIT 30 OFFSET %s ", offset)
  end
end
