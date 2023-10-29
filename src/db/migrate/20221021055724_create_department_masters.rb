class CreateDepartmentMasters < ActiveRecord::Migration[7.0]
  def change
    create_table :department_masters do |t|
      t.string :name
      t.boolean :enable

      t.timestamps
    end
  end
end
