<?php

namespace Fuel\Migrations;

class Create_inventories
{
	public function up()
	{
		\DBUtil::create_table('inventories', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'barcode' => array('constraint' => 255, 'type' => 'varchar'),
			'short_code' => array('constraint' => 255, 'type' => 'varchar'),
			'inventory_units_id' => array('constraint' => 11, 'type' => 'int'),
			'warning_level' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('inventories');
	}
}