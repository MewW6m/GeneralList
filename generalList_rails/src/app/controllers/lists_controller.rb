class ListsController < ApplicationController
  before_action :authenticate_user!
  # 画面描画
  def index
  end

  # 検索API
  # @return [String] json
  def show
    whereParam = []
    sql = ""
    sql += createSelectQuery()
    sql += createFromJoinQuery()
    sql += createWhereQuery(params[:itemCode], params[:itemName], params[:status], params[:registUser], params[:updateUser], whereParam)
    sql += createOrderbyQuery(params[:sort], params[:order])
    sql += createLimitOffsetQuery(params[:page])
    sqlParam = [sql]
    sqlParam.concat(whereParam)
    logger.debug(whereParam)
    logger.debug(sqlParam)

    query = ActiveRecord::Base.sanitize_sql_array(sqlParam)
    stock = ActiveRecord::Base.connection.select_all(query).to_a
    total = stock.length == 0 ? 0 : stock[0]['totalCount']
    result = {zaikoList: stock, total: total}

    render json: result
  end

  private

  # SELECT句の生成
  # @return [String] SELECT句
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
        stocks.created_at as registDate, 
        c.name as updateUser, 
        c.email as updateMail, 
        e.name as updateOrgName, 
        stocks.updated_at as updateDate "
  end

  # FROM句の生成
  # @return [String] FROM句
  def createFromJoinQuery()
    return "
      FROM stocks 
      INNER JOIN item_masters a ON stocks.itemCode = a.id 
      INNER JOIN users b ON stocks.registUser = b.id 
      INNER JOIN users c ON stocks.updateUser = c.id 
      INNER JOIN department_masters d ON b.departmentId = d.id 
      INNER JOIN department_masters e ON c.departmentId = e.id "
  end

  # WHERE句の生成
  # @param [String] itemCode 物品コード
  # @param [String] itemName 物品名
  # @param [String] status ステータス
  # @param [String] registUser 登録ユーザ
  # @param [String] updateUser 更新ユーザ
  # @param [list] whereParam WHERE句の挿入値
  # @return [String] WHERE句
  def createWhereQuery(itemCode, itemName, status, registUser, updateUser, whereParam)
    query = ""
    whereFlag = (itemCode != "" || itemName != "" || status != "" || registUser != "" || updateUser != "")
    if whereFlag then
      query += "WHERE "
    end
    if itemCode != "" then
      query += 'stocks.itemCode = ? AND '
      whereParam.push(itemCode)
    end
    if itemName != "" then
      query += 'a.name like ? AND '
      whereParam.push("%" + itemName + "%")
    end
    if status != "" then
      query += 'stocks.status = ? AND '
      whereParam.push(status)
    end
    if registUser != "" then
      query += 'b.name like ? AND '
      whereParam.push("%" + registUser + "%")
    end
    if updateUser != "" then
      query += 'c.name like ? AND '
      whereParam.push("%" + updateUser + "%")
    end
    if whereFlag then
      query.slice!(-4, 4)
    end
    return query
  end

  # ORDERBY句の生成
  # @param [String] sort ソート項目
  # @param [String] order ソート順
  # @return [String] ORDERBY句
  def createOrderbyQuery(sort, order)
    return format("ORDER BY %s %s ", sort, order)
  end

  # LIMITOFFSET句の生成
  # @param [String] page ページ番号
  # @return [String] LIMITOFFSET句
  def createLimitOffsetQuery(page)
    offset = (page.to_i - 1) * 30
    return format("LIMIT 30 OFFSET %s ", offset)
  end

end
