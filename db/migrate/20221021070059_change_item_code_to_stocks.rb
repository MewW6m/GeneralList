class ChangeItemCodeToStocks < ActiveRecord::Migration[7.0]
  def change
    change_column :stocks, :itemCode, :bigint
    change_column :stocks, :registUser, :bigint
    change_column :stocks, :updateUser, :bigint
  end
end
