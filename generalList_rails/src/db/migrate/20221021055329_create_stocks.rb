class CreateStocks < ActiveRecord::Migration[7.0]
  def change
    create_table :stocks do |t|
      t.string :status
      t.string :itemCode
      t.string :registUser
      t.string :updateUser
      t.boolean :enable

      t.timestamps
    end
  end
end
