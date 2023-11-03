class AdddepartmentIdToUsers < ActiveRecord::Migration[7.0]
  def change
    add_column :users, :departmentId, :bigint
  end
end
