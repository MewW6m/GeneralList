class RemoveCodeToItemMasters < ActiveRecord::Migration[7.0]
  def change
    remove_column :item_masters, :code, :string
  end
end
